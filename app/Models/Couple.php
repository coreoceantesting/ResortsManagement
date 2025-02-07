<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\Frarmhouse;

class Couple extends Model
{
    use HasFactory;

    protected $table ='couple';
    protected $fillable = [
        'customername',
        'booking_id',
        'booking_date',
        'firstname',
        'lastname',
        'mobile',
        'gender',
        'document',
    ];

}
