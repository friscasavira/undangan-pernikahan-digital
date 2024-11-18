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
        Schema::create('rsvp', function (Blueprint $table) {
            $table->integer('id_rsvp')->primary()->autoIncrement();
            $table->integer('id_wedding');
            $table->foreign('id_wedding')
                  ->references('id_wedding')
                  ->on('weddings')
                  ->onDelete('cascade')
                  ->onUpdate('cascade');
                  $table->string('name',50);
                  $table->string('email',50)->unique();
                  $table->string('phone',15);
                  $table->string('message',255);
                  $table->enum('attendance_status', ['Belum Konfirmasi','Hadir','Tidak Hadir']);
            $table->integer('total_guests');

            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('rsvp');
    }
};
