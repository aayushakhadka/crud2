<?php

namespace App\Models;

use App\Traits\FileStorage;


use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Category extends Model
{
    use HasFactory, FileStorage;
    protected $fillable = ['name', 'photo'];

    public function getPhotoAttribute($value)
    {
        return $this->getFile('uploads/categories', $value);
    }

    public function getNameAttribute($value)
    {
        return strtoupper($value);
    }

    public function products()
    {
        return $this->hasMany(Products::class);
    }
}
