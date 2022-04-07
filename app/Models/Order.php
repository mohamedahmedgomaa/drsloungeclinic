<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Database\Eloquent\SoftDeletes;

class Order extends Model
{
    use HasFactory;
    use SoftDeletes;

    protected $fillable = [
        'user_id',
        'order_status_id',
        'name',
        'email',
        'phone',
//        'delivery_date',
//        'delivery_fee',
        'platform'
    ];

    public function orderDetails(): HasMany {
        return $this->hasMany( OrderDetail::class );
    }

    public function admin(): BelongsTo {
        return $this->belongsTo( Admin::class );
    }

    public function user(): BelongsTo {
        return $this->belongsTo( User::class );
    }
    public function orderStatus(): BelongsTo {
        return $this->belongsTo( OrderStatus::class );
    }


}
