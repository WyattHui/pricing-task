<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class PriceItemRule extends Model
{
    public function location()
    {
        return $this->belongsTo(Location::class);
    }

    public function membership()
    {
        return $this->belongsTo(Membership::class);
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
