<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Analysis extends Model
{
    use HasFactory;
    protected $table = 'analyses';
    protected $fillable = [
        'hospitals_id',
        'name',
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
    public function analysisImages(){
        return $this->hasMany(AnalysisImage::class, 'analysis_id', 'id');
    }
    public function analysisTimes(){
        return $this->hasMany(AnalysisTime::class, 'analysis_id', 'id');
    }
}
