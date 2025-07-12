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
    Schema::create('boss_guides', function (Blueprint $table) {
        $table->id();

        // Basic Info
        $table->string('name');
        $table->enum('boss_type', ['Weekly', 'Field', 'Story']);
        $table->string('image')->nullable();
        $table->string('location')->nullable();
        $table->string('location_image')->nullable();
        $table->integer('recommended_level')->nullable();

        // Reset & Availability
        $table->string('reset_schedule')->nullable();
        $table->integer('trailblaze_cost')->nullable();

        // Elemental Info
        $table->json('weaknesses')->nullable(); // array: Physical, Fire, etc
        $table->json('resistances')->nullable(); // array: name + value

        // Team Strategy
        $table->json('recommended_team_ids')->nullable(); // array of party IDs
        $table->json('team_roles')->nullable(); // DPS, Sub-DPS, Support, Sustain

        // Strategy Guide
        $table->json('phase_strategies')->nullable(); // Phase-by-phase text
        $table->string('strategy_image')->nullable(); // Image for strategy guide
        $table->text('common_mistakes')->nullable();
        $table->text('pro_tips')->nullable();

        $table->timestamps();
    });
}


    public function down(): void
    {
        Schema::dropIfExists('boss_guides');
    }
};
