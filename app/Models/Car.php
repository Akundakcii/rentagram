<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Spatie\FlareClient\Concerns\HasContext;

class Car extends Model
{
    use HasFactory,SoftDeletes;
    protected  $primaryKey = "car_id";
    protected $fillable=[
        "car_id",
        "category_id",
        "user_id",
        "name",
        "km",
        "model",
        "brand",
        "price",
        "fuel",
        "engine",
        "slug",
        "is_active",
        "description"
    ];
public function category(){

    return $this->hasOne(Category::class,"category_id","category_id");

}
    public function images(){

        return $this->hasMany(CarImage::class,"car_id","car_id");

    }
    public function user(){

        return $this->belongsTo(User::class,"user_id","user_id");

    }
}
