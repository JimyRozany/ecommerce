<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Product extends Model
{
    use HasFactory ,SoftDeletes ;

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

    public function sales()
    {
       return $this->hasMany(Sales::class);
    }

}
