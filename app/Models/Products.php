<?php

namespace App\Models;

use App\Traits\FileStorage;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Products extends Model
{
    use HasFactory, FileStorage;

    protected $fillable = ['name', 'photo', 'category_id', 'price'];


    public function getPhotoAttribute($value)
    {
        return $this->getfile('uploads/categories', $value);
    }

    public function category()
    {
        return $this->belongsTo(Category::class);
    }
}
