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
            $table->integer('id_guest');
            $table->foreign('id_guest')
                  ->references('id_guest')
                  ->on('guests')
                  ->onDelete('cascade')
                  ->onUpdate('cascade');
            $table->text('message');
            $table->enum('attendance_status', ['Belum Konfirmasi', 'Hadir', 'Tidak hadir']);
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
