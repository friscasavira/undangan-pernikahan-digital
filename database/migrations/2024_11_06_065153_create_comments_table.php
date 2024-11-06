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
        Schema::create('comments', function (Blueprint $table) {
            $table->integer('id_comments')->primary()->autoIncrement();
            $table->integer('id_wedding');
            $table->foreign('id_wedding')
                  ->references('id_wedding')
                  ->on('weddings')
                  ->onDelete('cascade')
                  ->onUpdate('cascade');
                  
            $table->string('name_tamu', 50);
            $table->text('message');
            $table->timestamps();
        });
    }
    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('comments');
    }
};
