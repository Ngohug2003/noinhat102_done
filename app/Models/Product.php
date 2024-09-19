<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Str;
class Product extends Model
{
    use HasFactory;
    protected $fillable = [
        'category_id','name','slug','price','discount','short_description','description','image'
    ];
     // Tự động tạo slug khi tạo sản phẩm mới
     public static function boot()
     {
         parent::boot();
 
         static::creating(function ($product) {
             $product->slug = Str::slug($product->name);
         });
     }
 
     // Tùy chọn: Thêm phương thức để cập nhật slug khi tên sản phẩm thay đổi
     public function setNameAttribute($value)
     {
         $this->attributes['name'] = $value;
         $this->attributes['slug'] = Str::slug($value);
     }
    public function category(){
        return $this->belongsTo(Category::class);
    }
    
    public function galleries()
    {
        return $this->hasMany(Gallerie::class);
    }
}
