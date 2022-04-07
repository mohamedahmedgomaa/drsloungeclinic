<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateOrderStatusTranslationsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('order_status_translations', function (Blueprint $table) {
            $table->id();
            $table->string( 'name' );
            $table->string( 'locale' )->index();
            $table->unique( [ 'order_status_id', 'locale' ] );
            $table->foreignId( 'order_status_id' )->constrained()->onDelete( 'cascade' );
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('order_status_translations');
    }
}
