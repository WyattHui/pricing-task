<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class PriceItem extends Model
{
    const TYPE_CLASS = 'CLASS';
    const TYPE_PRODUCT = 'PRODUCT';

    public function priceOption()
    {
        return $this->belongsTo(PriceOption::class);
    }

    public function priceItemRules()
    {
        return $this->hasMany(PriceItemRule::class);
    }
}
