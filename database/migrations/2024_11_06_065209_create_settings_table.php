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
        Schema::create('settings', function (Blueprint $table) {
            $table->integer('id_settings')->primary()->autoIncrement();
            $table->integer('id_wedding');
            $table->foreign('id_wedding')
                  ->references('id_wedding')
                  ->on('weddings')
                  ->onDelete('cascade')
                  ->onUpdate('cascade');

            $table->string('cover_photo', 255);
            $table->string('background_music',255);
            $table->string('theme',50);
            $table->timestamps();
        });
    }
    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('settings');
    }
};
