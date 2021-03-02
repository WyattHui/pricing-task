<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\PriceItem;
use App\Http\Controllers\Controller;

class PriceItemController extends Controller
{
    public function get($id)
    {
        return PriceItem::select()
            ->id($id)
            ->with([
                'priceOption',
                'priceItemRules',
                'priceItemRules.location',
                'priceItemRules.membership'
            ])
            ->first();
    }

    public function quote($id, Request $request)
    {
        $request->validate([
            'isWeekday' => 'nullable|boolean',
            'isWeekend' => 'nullable|boolean',
            'locationId' => 'nullable|integer',
            'membershipId' => 'nullable|integer'
        ]);

        $priceItem = PriceItem::select()
            ->id($id)
            ->with([
                'priceOption',
                'priceItemRules' => function($query) use ($request) {
                    $query->where(function($query) use ($request)  {
                        if ($request->has('isWeekday')) {
                            $query->orWhere(function ($query) use ($request) {
                                $query->isWeekday($request->get('isWeekday'));
                            });
                        }
                        if ($request->has('isWeekend')) {
                            $query->orWhere(function ($query) use ($request) {
                                $query->isWeekend($request->get('isWeekend'));
                            });
                        }
                        if ($request->has('locationId')) {
                            $query->orWhere(function ($query) use ($request) {
                                $query->locationId($request->get('locationId'));
                            });
                        }
                        if ($request->has('membershipId')) {
                            $query->orWhere(function ($query) use ($request) {
                                $query->membershipId($request->get('membershipId'));
                            });
                        }
                    });
                }
            ])
            ->first();

        $finalPrice = $priceItem->price;
        foreach ($priceItem->priceItemRules as $item) {
            if (!is_null($item->price_overwrite)) {
                $finalPrice = $item->price_overwrite;
            }
            if (!is_null($item->markup)) {
                $finalPrice = $finalPrice * $item->markup;
            }
            if ($item->disable) {
                $priceItem->disable = true;
            }
        }
        $priceItem->final_price = $finalPrice;

        return $priceItem;
    }
}
