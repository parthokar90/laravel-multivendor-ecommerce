<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateSystemStatusesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('system_statuses', function (Blueprint $table) {
            $table->id();
            $table->string('status_name',100);
            $table->tinyInteger('vendor_found')->default(0);
            $table->tinyInteger('user_found')->default(0);
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
        Schema::dropIfExists('system_statuses');
    }
}
