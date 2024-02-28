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
        Schema::create('blogs', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('user_id');
            $table->unsignedBigInteger('category_id');
            $table->longText('title')->nullable();
            $table->longText('culture')->nullable();
            $table->longText('people')->nullable();
            $table->longText('language')->nullable();
            $table->longText('food_drink')->nullable();
            $table->longText('music')->nullable();
            $table->longText('arts')->nullable();
            $table->longText('location')->nullable();
            $table->longText('religion')->nullable();
            $table->longText('politics')->nullable();
            $table->longText('events')->nullable();
            $table->longText('history')->nullable();
            $table->unsignedBigInteger('views')->nullable();
            $table->timestamps();

            // Define foreign key constraints
            $table->foreign('user_id')->references('id')->on('users')->onDelete('cascade');
            $table->foreign('category_id')->references('id')->on('categories')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('blogs');
    }
};
