<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class DoctorTime extends Model
{
    use HasFactory;
    protected $table = 'doctor_times';
    protected $fillable = [
        'doctor_id',
        'time_id',
        'quantity'
    ];
    public function time(){
        return $this->belongsTo(Time::class, 'time_id', 'id');
    }
}
