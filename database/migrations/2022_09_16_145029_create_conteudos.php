<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('conteudos', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('playlist_id');
            $table->foreign('playlist_id')->references('id')->on('playlists')->onDelete('cascade');
            $table->string('title',150);
            $table->string('url',255);
            $table->string('author',150)->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('conteudos');
    }
};
