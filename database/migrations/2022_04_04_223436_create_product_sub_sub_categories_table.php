<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateProductSubSubCategoriesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('product_sub_sub_categories', function (Blueprint $table) {
            $table->id();
            $table->foreignId('product_sub_category_id')->constrained();
            $table->string( 'image' )->nullable();
            $table->integer( 'sort' )->default( 0 );
            $table->softDeletes();
            $table->timestamps();


        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('product_sub_sub_categories');
    }
}
