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
        Schema::create('favorite_albums', function (Blueprint $table) {
            $table->id();
            $table->unsignedInteger('user_id');
            $table->string('album_name');
            $table->string('artist_name')->nullable();
            $table->string('image');
            $table->string('album_url')->nullable();
            $table->string('artist_url')->nullable();
            $table->string('rank')->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('favorite_albums');
    }
};
