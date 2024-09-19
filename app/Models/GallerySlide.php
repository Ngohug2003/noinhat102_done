<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class GallerySlide extends Model
{
    use HasFactory;

    protected $fillable = [
        'slide_id',
        'image',
    ];

    public function slide()
    {
        return $this->belongsTo(Slide::class);
    }
}
