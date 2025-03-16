<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\Analysis;
use App\Models\AnalysisTime;
use App\Models\Doctor;
use App\Models\DoctorTime;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class Cart extends Model
{
    use HasFactory;
    protected $table = 'cart';
    protected $fillable = [
        'user_id',
        'product_id',
        'product_time_id',
        'quantity'
    ];

    public function doctor(): BelongsTo
    {
        return $this->belongsTo(Doctor::class, 'product_id', 'id');
    }

    public function analysis(): BelongsTo
    {
        return $this->belongsTo(Analysis::class, 'product_id', 'id');
    }
    public function doctorTime()
    {
        return $this->hasOneThrough(
            Time::class,
            DoctorTime::class,
            'doctor_id',
            'id',
            'product_id',
            'time_id'
        );
    }
    public function analysisTime()
    {
        return $this->hasOneThrough(
            Time::class,
            AnalysisTime::class,
            'analysis_id',
            'id',
            'product_id',
            'time_id'
        );
    }

}
