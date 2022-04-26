<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

use Astrotomic\Translatable\Contracts\Translatable as TranslatableContract;
use Astrotomic\Translatable\Translatable;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Database\Eloquent\SoftDeletes;


class Product extends Model implements TranslatableContract
{
    use HasFactory;
    use Translatable;
    use SoftDeletes;

    protected $fillable = [
        'admin_id',
        'image',
        'price',
        'product_category_id',
        'product_sub_category_id',
        'product_sub_sub_category_id',
        'status',
        'active',
        'views_number',
        'qty',
    ];

    public $translatedAttributes = ['name', 'description'];

    public function tags(): BelongsToMany {
        return $this->belongsToMany(Tag::class);
    }

    public function productCampaigns(): HasMany {
        return $this->hasMany(ProductCampaign::class);
    }
//
//    public function users(): BelongsToMany
//    {
//        return $this->belongsToMany(User::class);
//    }

    /**
     * @return BelongsTo
     */
    public function admin(): BelongsTo
    {
        return $this->belongsTo(Admin::class);
    }

    /**
     * @return BelongsTo
     */
    public function productCategory(): BelongsTo
    {
        return $this->belongsTo(ProductCategory::class)->withTrashed();
    }

    /**
     * @return BelongsTo
     */
    public function productSubCategory(): BelongsTo
    {
        return $this->belongsTo(ProductSubCategory::class)->withTrashed();
    }

    /**
     * @return BelongsTo
     */
    public function productSubSubCategory(): BelongsTo
    {
        return $this->belongsTo(ProductSubSubCategory::class)->withTrashed();
    }

    public function countDiscount()
    {
        $productCampaign = $this->productCampaigns()->where('status', 'active');
        if ($productCampaign->exists()) {
            $campaign_dis = $this->productCampaigns()->where('status', 'active')->first()->discount;
            return $this->price - $this->price * ($campaign_dis / 100);
        } else {
            return $this->price;
        }
    }

}
