<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Astrotomic\Translatable\Contracts\Translatable as TranslatableContract;
use Astrotomic\Translatable\Translatable;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Database\Eloquent\SoftDeletes;


class ProductCategory extends Model implements TranslatableContract
{
    use HasFactory;
    use Translatable;
    use SoftDeletes;

    protected $fillable = ['image', 'sort'];
    public $translatedAttributes = ['name'];

    public function product(): HasMany
    {
        return $this->hasMany(Product::class);
    }

    public function productSubCategory(): HasMany
    {
        return $this->hasMany(ProductSubCategory::class);
    }


}
