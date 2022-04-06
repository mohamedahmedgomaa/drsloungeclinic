<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Astrotomic\Translatable\Contracts\Translatable as TranslatableContract;
use Astrotomic\Translatable\Translatable;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Database\Eloquent\SoftDeletes;


class ProductSubSubCategory extends Model implements TranslatableContract
{
    use Translatable;
    use HasFactory;
    use SoftDeletes;

    protected $fillable = [ 'product_sub_category_id', 'image', 'sort' ];
    public $translatedAttributes = [ 'name' ];

    public function productSubCategory() {
        return $this->belongsTo( ProductSubCategory::class )->withTrashed();
    }

    public function products(): HasMany {
        return $this->hasMany( Product::class );
    }

}
