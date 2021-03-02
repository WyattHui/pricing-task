<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\PriceItemRule;
use App\Http\Requests\PriceItemRuleRequest;
use App\Http\Controllers\Controller;

class PriceItemRuleController extends Controller
{
    public function create(PriceItemRuleRequest $request)
    {
        return PriceItemRule::create($request->all());
    }

    public function update(PriceItemRuleRequest $request, PriceItemRule $priceItemRule)
    {
        return $priceItemRule->update($request->all());
    }

    public function list()
    {
        return PriceItemRule::get();
    }

    public function get(PriceItemRule $priceItemRule)
    {
        return $priceItemRule;
    }
}
