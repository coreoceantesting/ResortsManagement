<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Group extends Model
{
    use HasFactory;
    protected $table ='group';
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

    public function members()
    {
        return $this->hasMany(Group::class);
    }
    public function group()
    {
        return $this->belongsTo(Group::class);
    }
}
