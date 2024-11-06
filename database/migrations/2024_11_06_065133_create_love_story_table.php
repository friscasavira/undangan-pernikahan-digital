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
        Schema::create('love_story', function (Blueprint $table) {
            $table->integer('id_story')->primary()->autoIncrement();
            $table->integer('id_wedding');
            $table->foreign('id_wedding')
                  ->references('id_wedding')
                  ->on('wedding')
                  ->onDelete('cascade')
                  ->onUpdate('cascade');
                  
            $table->string('photo_url',255);
            $table->date('date_story');
            $table->string('tittle_story',50);
            $table->text('description_story');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('love_story');
    }
};
