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
            $table->string('product_name',150);
            $table->string('product_slug',150);
            $table->bigInteger('quantity')->default(0);
            $table->bigInteger('alert_quantity')->default(0);
            $table->decimal('regular_price',18,2)->default(0);
            $table->decimal('sale_price',18,2)->default(0);
            $table->decimal('cost_price',18,2)->default(0);
            $table->string('image',255);
            $table->string('tag',100)->nullable();
            $table->tinyInteger('is_featured')->default(0);
            $table->string('dimension',100)->nullable();
            $table->text('short_description')->nullable();
            $table->text('long_description')->nullable();
            $table->unsignedBigInteger('brand_id');
            $table->unsignedBigInteger('vendor_id');
            $table->unsignedBigInteger('shop_id');
            $table->unsignedBigInteger('created_by');
            $table->tinyInteger('status')->default(1);
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
