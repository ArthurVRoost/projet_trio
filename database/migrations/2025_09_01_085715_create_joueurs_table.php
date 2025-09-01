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
        Schema::create('joueurs', function (Blueprint $table) {
            $table->id();
            $table->string('nom');
            $table->string('prenom');
            $table->unsignedInteger('age');
            $table->string('tel');
            $table->string('email')->unique();
            $table->string('pays');
            $table->foreignId('position_id')->constrained('positions');
            $table->foreignId('equipe_id')->nullable()->constrained('equipes')->nullOnDelete();
            $table->foreignId('genre_id')->constrained('genres');
            $table->foreignId('user_id')->nullable()->constrained('users');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('joueurs');
    }
};
