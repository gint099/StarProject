<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration {
    public function up(): void
        {
            Schema::create('parties', function (Blueprint $table) {
                $table->id();
                $table->string('name');
                $table->string('type'); // F2P, Hypercarry, dll
                $table->foreignId('dps_id')->constrained('characters')->onDelete('cascade');
                $table->foreignId('sub_dps_id')->nullable()->constrained('characters')->onDelete('cascade');
                $table->foreignId('support_id')->nullable()->constrained('characters')->onDelete('cascade');
                $table->foreignId('sustain_id')->nullable()->constrained('characters')->onDelete('cascade');
                $table->text('description')->nullable();
                $table->timestamps();
            });
        }
};
