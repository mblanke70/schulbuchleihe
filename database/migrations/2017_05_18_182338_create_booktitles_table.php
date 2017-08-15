<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateBooktitlesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('booktitles', function (Blueprint $table) {
            
            $table->increments('id');
            $table->string('titel');
            $table->string('verlag');
            $table->float('preis', 4, 2);
            $table->string('kennung');
            $table->integer('bestand');
            $table->integer('ausgeliehen');
            $table->float('leihgebuehr', 4, 2);
            $table->string('isbn');

            $table->timestamps('');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('booktitles');
    }
}
