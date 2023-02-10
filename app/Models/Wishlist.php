<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Wishlist extends Model
{
    use HasFactory;
    protected $table= 'wishlists';
    protected $fillable=
    [
        'user_id',
        'product_id',
        'product_qty',
        'selling_price',
    ];

    public function Products()
    {
        return $this->belongsTo(Product::class,'product_id','id');
    }
}
