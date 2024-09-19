<?php

// app/Models/Ward.php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Ward extends Model
{
    use HasFactory;

    // Chỉ định tên bảng nếu khác tên mặc định
    protected $table = 'wards';

    // Các trường có thể được gán hàng loạt
    protected $fillable = ['id','name','district_id'];

    // Mối quan hệ với bảng districts
    public function district()
    {
        return $this->belongsTo(District::class);
    }
}
