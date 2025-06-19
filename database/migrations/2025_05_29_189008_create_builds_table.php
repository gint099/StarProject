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
        Schema::create('builds', function (Blueprint $table) {
            $table->id();
            $table->foreignId('character_id')->constrained()->onDelete('cascade');
            $table->string('name');
            $table->text('description')->nullable();

            // Lightcones (JSON array)
            $table->json('lightcone_ids')->nullable();

            // Stats values
            $table->decimal('spd_value', 8, 1)->nullable();
            $table->decimal('cr_value', 8, 1)->nullable();
            $table->decimal('cd_value', 8, 1)->nullable();
            $table->decimal('er_value', 8, 1)->nullable();
            $table->decimal('hr_value', 8, 1)->nullable();
            $table->decimal('be_value', 8, 1)->nullable();

            // Main stats
            $table->string('body_main_stat')->nullable();
            $table->string('boots_main_stat')->nullable();
            $table->string('planar_main_stat')->nullable();
            $table->string('rope_main_stat')->nullable();

            // Substats (JSON array)
            $table->json('substats')->nullable();

            // Eidolon level
            $table->integer('eidolon_level')->default(0);

            // Relic sets (JSON array)
            $table->json('relic_sets')->nullable();

            // Planar ornament sets (JSON array)
            $table->json('planar_ornament_ids')->nullable();

            // Synergy characters (JSON array)
            $table->json('synergy_character_ids')->nullable();

            $table->timestamps();

            // Indexes
            $table->index('character_id');
            $table->index('name');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('builds');
    }
};
