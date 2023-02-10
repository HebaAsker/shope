<?php

namespace App\Models;

use Illuminate\Support\Facades\DB;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Product extends Model
{
    protected $table='products';
    protected $fillable=[
        'category_id',
        'name',
        'slug',
        'small_description',
        'description',
        'original_price',
        'selling_price',
        'image',
        'qty',
        'tax',
        'status',
        'trending',
    ];
    //category--->product relationship
    public function category()
    {
        return $this->belongsTo(Category::class,'category_id','id');
    }

    //product--->cart relationship
    public function Cart()
    {
        return $this->belongsTo(Cart::class);
    }
    //product--->reviewa relationship
    public function reviews()
    {
	    return $this->hasMany(Review::class);
    }




}
