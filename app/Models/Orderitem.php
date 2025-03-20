<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class Orderitem extends Model
{
    use HasFactory;
    protected $table = 'orders_items';
    protected $fillable = [
        'order_id',
        'product_id',
        'product_time_id',
        'price'
    ];

    public function product()
    {
        return $this->belongsTo(Doctor::class, 'product_id')->orWhereHas('analysis');
    }

    public function doctor()
    {
        return $this->belongsTo(Doctor::class, 'product_id');
    }

    public function analysis()
    {
        return $this->belongsTo(Analysis::class, 'product_id');
    }

    public function productTime()
    {
        return $this->belongsTo(DoctorTime::class, 'product_time_id')->orWhereHas('analysisTime');
    }

    public function doctorTime()
    {
        return $this->belongsTo(DoctorTime::class, 'product_time_id');
    }

    public function analysisTime()
    {
        return $this->belongsTo(AnalysisTime::class, 'product_time_id');
    }

}
