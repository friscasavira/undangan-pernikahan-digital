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
        Schema::create('weddings', function (Blueprint $table) {
            $table->integer('id_wedding')->primary()->autoIncrement();
            $table->integer('id_user');
            $table->foreign('id_user')
                  ->references('id_user')
                  ->on('users')
                  ->onDelete('cascade')
                  ->onUpdate('cascade');
            $table->string('title',25);
            $table->string('bride_name',50);
            $table->string('groom_name',50);
            $table->date('wedding_date');
            $table->time('wedding_time');
            $table->text('location', 255);
            $table->text('message', 255);
            $table->string('bride_photo', 255);
            $table->string('groom_photo', 255);
            $table->string('unique_url', 255);


            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('weddings');
    }
};
