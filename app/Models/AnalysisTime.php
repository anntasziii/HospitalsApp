<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class AnalysisTime extends Model
{
    use HasFactory;
    protected $table = 'analysis_times';
    protected $fillable = [
        'analysis_id',
        'time_id',
        'quantity'
    ];
    public function time(){
        return $this->belongsTo(Time::class, 'time_id', 'id');
    }
}
