<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class DefaultUserHasBooking extends Model
{
    protected $fillable = [
        'status_id', 'booking_id'
    ];
}
