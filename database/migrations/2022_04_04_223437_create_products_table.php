<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateProductsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('products', function (Blueprint $table) {
            $table->id();
            $table->foreignId('admin_id')->constrained();
            $table->string('image');
            $table->decimal('price', 12, 2);
            $table->foreignId('product_category_id')->constrained();
            $table->foreignId('product_sub_category_id')->constrained();
            $table->foreignId('product_sub_sub_category_id')->nullable()->constrained();
            $table->enum('status', ['waiting', 'active', 'refused'])->default('waiting');
            $table->boolean('active')->default(1);
            $table->bigInteger('views_number')->default(0);
            $table->integer('qty');
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
        Schema::dropIfExists('products');
    }
}
