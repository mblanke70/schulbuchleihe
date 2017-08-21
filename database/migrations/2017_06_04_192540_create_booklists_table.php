<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateBooklistsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('booklists', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('jahrgang');
            $table->string('schuljahr');
            $table->timestamps();
        });

        Schema::create('booklist_booktitle', function (Blueprint $table) {
            $table->integer('booktitle_id');
            $table->integer('booklist_id');
            $table->primary(['booktitle_id', 'booklist_id']);
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('booklists');
        Schema::dropIfExists('booklist_booktitle');
    }
}
