<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Support\Str;
class Post extends Model
{
    use HasFactory;
    protected $fillable = ['id','name','content','views','status','image','slug','created_by','updated_by'];
    public static function boot()
    {
        parent::boot();

        static::saving(function ($post) {
            if (empty($post->slug)) {
                $post->slug = Str::slug($post->name);
            }
        });
    }
    public function setNameAttribute($value)
    {
        $this->attributes['name'] = $value;
        $this->attributes['slug'] = Str::slug($value);
    }
    public function creator(): BelongsTo{
        return $this->belongsTo(User::class, 'created_by');
    }
    public function updater(): BelongsTo{
        return $this->belongsTo(User::class, 'updated_by');
    }
}
