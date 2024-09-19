<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Support\Str;

class Category extends Model
{
    use HasFactory;
    protected $fillable = ['name','slug','image','created_by','updated_by'];
    protected static function boot()
    {
        parent::boot();

        static::creating(function ($category) {
            $category->slug = Str::slug($category->name);
        });
    }
    public function setNameAttribute($value)
    {
        $this->attributes['name'] = $value;
        $this->attributes['slug'] = Str::slug($value);
    }
    public function products() {
        return $this->hasMany(Product::class);
    }
    public function creator(): BelongsTo{
        return $this->belongsTo(User::class, 'created_by');
    }
    public function updater(): BelongsTo{
        return $this->belongsTo(User::class, 'updated_by');
    }
}
