<?php

// app/Models/District.php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class District extends Model
{
    use HasFactory;

    // Chỉ định tên bảng nếu khác tên mặc định
    protected $table = 'districts';

    // Các trường có thể được gán hàng loạt
    protected $fillable = ['id','name','province_id'];

    // Mối quan hệ với bảng provinces
    public function province()
    {
        return $this->belongsTo(Province::class);
    }

    // Mối quan hệ với bảng wards
    public function wards()
    {
        return $this->hasMany(Ward::class);
    }
}
