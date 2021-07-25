<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateVendorsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('vendors', function (Blueprint $table) {
            $table->id();
            $table->string('first_name',100)->nullable();
            $table->string('last_name',100)->nullable();
            $table->string('email')->unique();
            $table->string('password',100)->nullable();
            $table->string('mobile',100)->nullable();
            $table->string('image',255)->nullable();
            $table->text('address')->nullable();
            $table->unsignedBigInteger('country_id')->default(0);
            $table->unsignedBigInteger('role')->default(0);
            $table->string('city',100)->nullable();
            $table->string('zip_code',100)->nullable();
            $table->tinyInteger('gender')->default(0);
            $table->unsignedBigInteger('created_by');
            $table->tinyInteger('status')->default(0);
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
        Schema::dropIfExists('vendors');
    }
}
