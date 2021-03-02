<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class PriceOption extends Model
{
    public function priceItems()
    {
        return $this->hasMany(PriceItem::class);
    }
}
