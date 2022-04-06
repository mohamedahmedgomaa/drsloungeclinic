<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Astrotomic\Translatable\Contracts\Translatable as TranslatableContract;
use Astrotomic\Translatable\Translatable;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Database\Eloquent\SoftDeletes;


class ProductSubCategory extends Model implements TranslatableContract
{
    use HasFactory;
    use Translatable;
    use SoftDeletes;

    protected $fillable = [ 'product_category_id', 'image', 'sort' ];
    public $translatedAttributes = [ 'name' ];

    public function productCategory() {
        return $this->belongsTo( ProductCategory::class, 'product_category_id' )->withTrashed();
    }

    public function productSubSubcategory(): HasMany {
        return $this->hasMany( ProductSubSubCategory::class, 'product_sub_category_id' );
    }

}
