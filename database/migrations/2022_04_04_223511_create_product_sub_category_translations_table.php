<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateProductSubCategoryTranslationsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('product_sub_category_translations', function (Blueprint $table) {
            $table->id();
            $table->string( 'name', 255 )->unique();
            $table->string( 'locale' )->index();
            $table->unique( [ 'product_sub_category_id', 'locale' ], 'pro_sub_cat_index_unique' );
            $table->unsignedBigInteger( 'product_sub_category_id' );
            $table->foreign( 'product_sub_category_id', 'pro_sub_cat_index_unique' )->references( 'id' )->on( 'product_sub_categories' );
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('product_sub_category_translations');
    }
}
