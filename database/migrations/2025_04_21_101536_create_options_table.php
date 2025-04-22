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
        Schema::create('options', function (Blueprint $table) {
            $table->id();

            // L’étape actuelle
            $table->foreignId('step_id')->constrained()->onDelete('cascade');

            // L’étape suivante (relation à soi-même via Step)
            $table->foreignId('next_step_id')->nullable()->constrained('steps')->onDelete('set null');

            // Le texte affiché pour ce choix
            $table->string('text');

            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('options');
    }
};
