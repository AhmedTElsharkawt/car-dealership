<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    protected $fillable = ['name', 'description', 'mileage', 'price', 'image', 'make_id', 'color', 'year', 'transmission', 'fuel_type'];

    public function make()
    {
        return $this->belongsTo(Make::class);
    }

    public function productImages()
    {
        return $this->hasMany(ProductImage::class);
    }
}
