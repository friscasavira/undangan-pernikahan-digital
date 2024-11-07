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
        Schema::create('events', function (Blueprint $table) {
            $table->integer('id_event')->primary()->autoIncrement();
            $table->integer('id_wedding');
            $table->foreign('id_wedding')
                  ->references('id_wedding')
                  ->on('weddings')
                  ->onDelete('cascade')
                  ->onUpdate('cascade');
            $table->string('event_name',50);
            $table->date('event_date');
            $table->time('event_time');
            $table->text('event_location', 255);

            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('events');
    }
};
