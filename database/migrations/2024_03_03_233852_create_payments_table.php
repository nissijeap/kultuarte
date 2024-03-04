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
        Schema::create('payments', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('sold_by')->nullable();
            $table->unsignedBigInteger('sold_to')->nullable();
            $table->unsignedBigInteger('post_id');
            $table->string('channel');
            $table->decimal('amount', 10, 2);
            $table->enum('status', ['pending', 'received', 'not_received'])->default('pending');
            $table->string('receipt')->nullable();
            $table->timestamp('verified_at')->nullable();
            $table->timestamps();

            // Define foreign key constraints
            $table->foreign('sold_by')->references('id')->on('users')->onDelete('cascade');
            $table->foreign('sold_to')->references('id')->on('users')->onDelete('cascade');
            $table->foreign('post_id')->references('id')->on('posts')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('payments');
    }
};
