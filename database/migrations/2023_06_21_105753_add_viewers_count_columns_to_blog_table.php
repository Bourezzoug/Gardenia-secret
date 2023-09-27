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
        Schema::table('blog', function (Blueprint $table) {
            $table->unsignedBigInteger('unique_viewers_count')->default(0);
            $table->unsignedBigInteger('total_viewers_count')->default(0);
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('blog', function (Blueprint $table) {
            $table->dropColumn('unique_viewers_count');
            $table->dropColumn('total_viewers_count');
        });
    }
};
