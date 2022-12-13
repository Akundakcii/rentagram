<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class CartDetails extends Model
{
    use HasFactory;
    protected $primaryKey = "cart_detail_id";

    protected $fillable =[
        'cart_detail_id',
        'cart_id',
        'car_id',
        'quantity'

    ];
    public function car()
    {

        return $this->hasOne(Car::class,"car_id","car_id");
    }
}
