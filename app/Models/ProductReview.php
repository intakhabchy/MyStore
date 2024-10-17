<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ProductReview extends Model
{
    use HasFactory;

    protected $fillable = ['reviews','rating','user_id','product_id'];

    public function product(){
        return $this->belongsTo(Product::class);
    }
}
