<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Order extends Model
{
    protected $fillable = ['user_phone','address','product_id','product_name','quantity','total_cost'];
}
