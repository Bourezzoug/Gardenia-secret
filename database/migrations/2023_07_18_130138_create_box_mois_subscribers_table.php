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
        Schema::create('box_mois_subscribers', function (Blueprint $table) {
            $table->id();
            $table->string('nom_complet');
            $table->string('email');
            $table->string('ville');
            $table->string('telephone');
            $table->string('addresse');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('box_mois_subscribers');
    }
};
