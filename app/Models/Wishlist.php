<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Wishlist extends Model
{
    use HasFactory;
    protected $table = 'wishlists';
    protected $fillable = [
        'user_id',
        'doctor_id',
        'analysis_id'
    ];

    // public function product(): BelongsTo
    // {
    //     return $this->belongsTo(Product::class, 'product_id', 'id');
    // }
}
