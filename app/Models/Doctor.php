<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Doctor extends Model
{
    use HasFactory;
    protected $table = 'doctors';
    protected $fillable = [
        'hospitals_id',
        'name_of_specialty',
        'name',
        'surname',
        'slug',
        'type',
        'small_description',
        'description',
        'original_price',
        'quantity',
        'trending',
        'featured',
        'status',
        'meta_title',
        'meta_keyword',
        'meta_description'
    ];

    public function hospital(){
        return $this->belongsTo(Hospital::class, 'hospitals_id', 'id');
    }
    public function doctorImages(){
        return $this->hasMany(DoctorImage::class, 'doctor_id', 'id');
    }
    // public function productYears(){
    //     return $this->hasMany(ProductYear::class, 'product_id', 'id');
    // }

}
