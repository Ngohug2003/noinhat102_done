<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Customer extends Model
{
    use HasFactory;

    protected $fillable = ['name','email','phone','address','province_id','district_id','ward_id'];

    public function orders()
    {
        return $this->hasMany(Order::class);
    }
    public function province()
    {
        return $this->belongsTo(Province::class);
    }

    // Relationship with District
    public function district()
    {
        return $this->belongsTo(District::class);
    }

    // Relationship with Ward
    public function ward()
    {
        return $this->belongsTo(Ward::class);
    }
}
