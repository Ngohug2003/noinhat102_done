<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Order extends Model
{
    use HasFactory;

    protected $fillable = ['customer_id','total_price', 'status', 'note', 'delivery_time', 'payment_method', 'token'];

    public function customer()
    {
        return $this->belongsTo(Customer::class);
    }

    public function orderItems()
    {
        return $this->hasMany(OrderItem::class);
    }
    public function province()
    {
        return $this->hasOneThrough(
            Province::class,
            Customer::class,
            'id', // Foreign key trên bảng 'customers' (cột customer_id)
            'id', // Foreign key trên bảng 'provinces' (cột id)
            'customer_id', // Local key trên bảng 'orders' (cột customer_id)
            'province_id' // Local key trên bảng 'customers' (cột province_id)
        );
    }

    // Lấy thông tin huyện thông qua khách hàng
    public function district()
    {
        return $this->hasOneThrough(
            District::class,
            Customer::class,
            'id', // Foreign key trên bảng 'customers' (cột customer_id)
            'id', // Foreign key trên bảng 'districts' (cột id)
            'customer_id', // Local key trên bảng 'orders' (cột customer_id)
            'district_id' // Local key trên bảng 'customers' (cột district_id)
        );
    }

    // Lấy thông tin xã thông qua khách hàng
    public function ward()
    {
        return $this->hasOneThrough(
            Ward::class,
            Customer::class,
            'id', // Foreign key trên bảng 'customers' (cột customer_id)
            'id', // Foreign key trên bảng 'wards' (cột id)
            'customer_id', // Local key trên bảng 'orders' (cột customer_id)
            'ward_id' // Local key trên bảng 'customers' (cột ward_id)
        );
    }
}
