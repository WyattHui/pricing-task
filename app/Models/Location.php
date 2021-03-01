<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Location extends Model
{
    public function priceItemRules()
    {
        return $this->hasMany(PriceItemRule::class);
    }
}
