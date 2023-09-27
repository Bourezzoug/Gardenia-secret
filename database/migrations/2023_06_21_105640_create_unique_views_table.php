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
        Schema::create('unique_views', function (Blueprint $table) {
            $table->id();
            $table->string('ip_address');
            $table->unsignedBigInteger('blog_id');
            $table->timestamps();

            $table->foreign('blog_id')->references('id')->on('blog')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('unique_views');
    }
};
