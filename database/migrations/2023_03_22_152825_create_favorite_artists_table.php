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
        Schema::create('favorite_artists', function (Blueprint $table) {
            $table->id();
            $table->unsignedInteger('user_id');
            $table->string('artist_name');
            $table->string('slug');
            $table->string('mbid')->nullable();
            $table->string('url')->nullable();
            $table->string('image');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('favorite_artists');
    }
};
