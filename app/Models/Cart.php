<?php

namespace App\Models;

use App\Models\Product;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Auth;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Cart extends Model
{
    use HasFactory;
    protected $table='cart_products';
    protected $fillable=[
        'user_id',
        "product_id",
        'product_qty',
        'selling_price',
    ];

    //the next function use to fetch the data of the product from database to appear it at cart page
    public function Products()
    {
         return $this->belongsTo(Product::class,'product_id','id');
    }

    public function Cart()
    {
        return $this->belongsTo(Cart::class);
    }

    public function getSubTotalPrice(){
        $sub_price=DB::table("cart_products")->select(DB::raw('(selling_price * product_qty) as total_price'))->get()->sum('total_price');
        return $sub_price;
      }

    public function getTotalPrice(){
        $total_price=DB::table("cart_products")->select(DB::raw('(selling_price * product_qty) as total_price'))->get()->sum('total_price');
        return $total_price;
      }

}
