<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateHotelsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('hotels',function ($mytable)
        {
           $mytable->increments('id')->unique();
           $mytable->string('libelle_hot');
           $mytable->string('desc_hot');
           $mytable->integer('etole_hot') ;
           $mytable->string('ville_hot') ;

        });
    }

    public function down()
    {
        Schema::drop('hotels');
    }
}
