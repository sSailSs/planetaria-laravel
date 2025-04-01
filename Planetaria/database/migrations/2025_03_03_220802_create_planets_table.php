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
        Schema::create('planets', function (Blueprint $table) {
            if (!Schema::hasTable('planets')) {
                $table->id();
                $table->string('name');
                $table->string('type');
                $table->integer('size');
                $table->float('distance');
                $table->float('gravity');
                $table->string('atmosphere');
                $table->timestamps();
                }
        });
        
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('planets');
    }
};
