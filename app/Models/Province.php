<?php

// app/Models/Province.php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Province extends Model
{
    use HasFactory;

    // Chỉ định tên bảng nếu khác tên mặc định
    protected $table = 'provinces';

    // Các trường có thể được gán hàng loạt
    protected $fillable = ['id','name'];

    // Mối quan hệ với bảng districts
    public function districts()
    {
        return $this->hasMany(District::class);
    }
}
