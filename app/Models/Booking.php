<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Booking extends Model
{
    use HasFactory;
    protected $table ='booking';
    protected $fillable = [
        'booking_date',
        'couple_count',
        'group_member',
    ];

    // Define the one-to-many relationship with Customer
    public function customers()
    {
        return $this->hasMany(Customer::class);
    }
    
}
