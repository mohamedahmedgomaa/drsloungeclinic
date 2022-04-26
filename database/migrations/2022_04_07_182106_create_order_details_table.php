<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateOrderDetailsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('order_details', function (Blueprint $table) {
            $table->id();
            $table->foreignId( 'order_id' )->constrained();
            $table->foreignId( 'product_id' )->constrained();
            $table->string('product_name_ar');
            $table->string('product_name_en');
            $table->text('product_description_ar');
            $table->text('product_description_en');
            $table->string('image');
            $table->decimal( 'price', 12, 2 );
            $table->integer( 'qty' );
            $table->decimal( 'price_before_discount', 12, 2 );
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
        Schema::dropIfExists('order_details');
    }
}
