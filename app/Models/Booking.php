<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Booking extends Model
{
    use HasFactory;
    use SoftDeletes;

    protected $table = 'bookings';

    protected $fillable = [
        'name',
        'email_address',
        'booking_date',
        'booking_time',
        'booking_type',
        'booking_slot',
    ];

    const BOOKING_TYPE = [
        '1' => 'Half Day',
        '2' => 'Full Day'
    ];

    const BOOKING_SLOT = [
        '1' => 'Morning',
        '2' => 'Evening'
    ];
}
