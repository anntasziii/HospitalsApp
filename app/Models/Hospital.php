<?php

namespace App\Models;

use App\Models\Product;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Hospital extends Model
{
    use HasFactory;

    protected $table = 'hospitals';
    protected $fillable = [
        'name',
        'sity',
        'region',
        'slug',
        'description',
        'image',
        'meta_title',
        'meta_keyword',
        'meta_description',
        'status',
    ];
    // public function products(){
    //     return $this->hasMany(Product::class, 'category_id', 'id');
    // }
    // public function brands(){
    //     return $this->hasMany(Brand::class, 'category_id', 'id')->where('status', '0');
    // }
}
