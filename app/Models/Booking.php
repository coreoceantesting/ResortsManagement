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
        'status',
        'customername',
        'couple_count',
        'group_member',
    ];

    // Define the one-to-many relationship with Customer
    // Customer model
    public function couples()
    {
        return $this->hasMany(Couple::class, 'booking_id', 'id');
    }

    public function groups()
    {
        return $this->hasMany(Group::class,'booking_id', 'id'); // Assuming you have a Member model
    }
    
}
