<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class AnalysisImage extends Model
{
    use HasFactory;
    protected $table = 'analysis_images';

    protected $fillable = [
        'analysis_id',
        'image'
    ];
    public function analysis()
    {
        return $this->belongsTo(Analysis::class);
    }

}

