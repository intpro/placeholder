<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreatePlaceholdersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('placeholders', function(Blueprint $table)
        {
            $table->increments('id');
            $table->integer('width');
            $table->integer('height');
            $table->string('link');
            $table->string('hexcolor');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::drop('placeholders');
    }
}
