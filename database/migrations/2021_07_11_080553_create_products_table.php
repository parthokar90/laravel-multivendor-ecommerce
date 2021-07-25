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
            $table->bigInteger('quantity')->default(0);
            $table->bigInteger('alert_quantity')->default(0);
            $table->decimal('regular_price',18,2);
            $table->decimal('sale_price',18,2);
            $table->decimal('cost_price',18,2);
            $table->string('image',255);
            $table->string('dimension',100);
            $table->string('bar_code',100);
            $table->text('short_description');
            $table->text('long_description');
            $table->unsignedBigInteger('vendor_id');
            $table->unsignedBigInteger('created_id');
            $table->tinyInteger('status');
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
