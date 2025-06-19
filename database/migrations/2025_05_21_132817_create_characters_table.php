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
    Schema::create('characters', function (Blueprint $table) {
        $table->id();
        $table->string('name');
        $table->string('image')->nullable();
        $table->enum('path', ['Destruction', 'Hunt', 'Erudition', 'Harmony', 'Nihility', 'Preservation', 'Abundance', 'Remembrance']);
        $table->enum('rarity', [4, 5]);
        $table->integer('hp');
        $table->integer('atk');
        $table->integer('def');
        $table->integer('spd');
        $table->integer('taunt');
        $table->json('skills')->nullable();     // array berisi nama, deskripsi, image
        $table->json('traces')->nullable();     // 3 item
        $table->json('eidolons')->nullable();   // 6 item
        $table->json('story')->nullable();      // 5 teks
        $table->timestamps();
    });
}


    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('characters');
    }
};
