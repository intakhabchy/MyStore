<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class CustomerProfile extends Model
{
    use HasFactory;

    protected $fillable = [
        'user_id','customer_name','gender','customer_address','customer_phone','shipping_address','shipping_phone','date_of_birth'
    ];
}
