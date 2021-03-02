<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class PriceItemRule extends Model
{
    protected $fillable = [
        'price_overwrite',
        'markup',
        'is_weekday',
        'is_weekend',
        'location_id',
        'membership_id',
        'disable',
        'price_item_id'
    ];

    public function location()
    {
        return $this->belongsTo(Location::class);
    }

    public function membership()
    {
        return $this->belongsTo(Membership::class);
    }

    public function scopeId($query, $id) {
        $query->where('id', $id);
    }

    public function scopeIsWeekday($query, $value) {
        $query->where('is_weekday', $value);
    }

    public function scopeIsWeekend($query, $value) {
        $query->where('is_weekend', $value);
    }

    public function scopeLocationId($query, $value) {
        $query->where('location_id', $value);
    }

    public function scopeMembershipId($query, $value) {
        $query->where('membership_id', $value);
    }
}
