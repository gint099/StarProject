<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up()
    {
        Schema::table('characters', function (Blueprint $table) {
            $table->enum('element', ['Physical', 'Fire', 'Ice', 'Lightning', 'Wind', 'Quantum', 'Imaginary']);
        });
    }

    public function down()
    {
        Schema::table('characters', function (Blueprint $table) {
            $table->dropColumn('element');
        });
    }

};
