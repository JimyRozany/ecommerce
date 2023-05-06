<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    use HasFactory;

    protected $fillable = [

        'seller_id',
        'name',
        'description',
        'quantity',
        'status',
        'price',
        'image_path',
    ];

    public function seller()
    {
       return $this->belongsTo(Seller::class);
    }

}
