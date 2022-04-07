<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateOurServiceTranslationsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('our_service_translations', function (Blueprint $table) {
            $table->id();
            $table->string( 'name' );
            $table->string( 'description' );
            $table->string( 'locale' )->index();
            $table->unique( [ 'our_service_id', 'locale' ] );
            $table->foreignId( 'our_service_id' )->constrained()->onDelete( 'cascade' );
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('our_service_translations');
    }
}
