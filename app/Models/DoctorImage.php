<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class DoctorImage extends Model
{
    use HasFactory;
    protected $table = 'doctor_images';

    protected $fillable = [
        'doctor_id',
        'image'
    ];
    public function doctor()
    {
        return $this->belongsTo(Doctor::class);
    }

}
