<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateProductCampaignsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('product_campaigns', function (Blueprint $table) {
            $table->id();
            $table->foreignId( 'product_id' )->constrained();
            $table->integer( 'purchases_limits' );
            $table->integer( 'stock' );
            $table->date( 'expire' );
            $table->integer( 'discount');
            $table->enum( 'status', [ 'active', 'disabled' ] );
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
        Schema::dropIfExists('product_campaigns');
    }
}
