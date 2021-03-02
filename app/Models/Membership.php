<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Membership extends Model
{
    const TYPE_BASIC = 'BASIC';
    const TYPE_STANDARD = 'STANDARD';
    const TYPE_PREMIUM = 'PREMIUM';

    public function priceItemRules()
    {
        return $this->hasMany(PriceItemRule::class);
    }
}
