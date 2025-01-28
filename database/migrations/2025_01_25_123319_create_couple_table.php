<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('couple', function (Blueprint $table) {
            $table->id();

            $table->integer('booking_id');
            $table->string('booking_date');
            $table->string('customername');
            $table->string('firstname');
            $table->string('lastname');
            $table->string('mobile');
            $table->string('gender');
            $table->string('document')->nullable();
            $table->timestamps();
           
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('couple');
    }
};
