<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateCustomersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up(): void
    {
        Schema::create('customers', function (Blueprint $table) {
            $table->id();

            // Basic Info
            $table->string('first_name');
            $table->string('last_name')->nullable();

            // Login Info
            $table->string('email')->unique();
            $table->string('password');

            // Contact
            $table->string('mobile')->nullable();
            $table->text('address')->nullable();

            // Media
            $table->string('image')->nullable();

            // Status (active/inactive)
            $table->tinyInteger('status')->default(1);

            $table->timestamps();
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('customers');
    }
}
