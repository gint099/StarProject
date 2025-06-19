<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration {
    public function up(): void
    {
        Schema::create('relics', function (Blueprint $table) {
            $table->id();
            $table->string('name');
            $table->string('image');
            $table->string('head_image')->nullable();
            $table->string('hand_image')->nullable();
            $table->string('body_image')->nullable();
            $table->string('boots_image')->nullable();
            $table->string('planar_image')->nullable();
            $table->string('rope_image')->nullable();
            $table->enum('type', ['relic', 'planar'])->default('relic');
            $table->tinyInteger('rarity');
            $table->text('stat')->nullable(); // optional
            $table->text('set_bonus_2');
            $table->text('set_bonus_4')->nullable(); // only for 'relic'
            $table->timestamps();
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('relics');
    }
};
