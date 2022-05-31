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
        Schema::create('spotifycsv', function (Blueprint $table) {
            $table->id();
            $table->integer('Position');
            $table->string('Track Name');
            $table->string('Artist');
            $table->integer('Streams');
            $table->date('Date');
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
        Schema::dropIfExists('spotifycsv');
    }
};
