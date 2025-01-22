<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Customer extends Model
{
    use HasFactory;
    protected $fillable = [
        'booking_id',
        'firstname',
        'lastname',
        'mobile',
        'gender',
        'document',
    ];

    // Define the inverse relationship with Booking
    public function booking()
    {
        return $this->belongsTo(Booking::class);
    }
}
