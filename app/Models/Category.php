<?php

namespace App\Models;
use App\Models\Cart;
use App\Models\Car;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Category extends Model
{

    use HasFactory,SoftDeletes;
    protected $primaryKey="category_id";

    protected $fillable=[
        "category_id",
        "name",
        "slug",
        "is_active"

    ];
public function cars()
{
    return $this->hasMany(\App\Models\Car::class, "car_id", "car_id");


}

}
