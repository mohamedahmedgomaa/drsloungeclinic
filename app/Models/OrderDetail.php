<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class OrderDetail extends Model
{
    use HasFactory;

    protected $fillable = [
        'order_id',
        'product_id',
        'product_name_ar',
        'product_description_ar',
        'product_name_en',
        'product_description_en',
        'price',
        'price_before_discount',
        'image',
        'qty',
    ];


    public function product(): BelongsTo {
        return $this->belongsTo( Product::class );
    }

    public function order(): BelongsTo {
        return $this->belongsTo( Order::class );
    }


}
