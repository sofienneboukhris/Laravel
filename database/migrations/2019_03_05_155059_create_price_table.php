<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreatePriceTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('price',function ($mytable)
        {
          $mytable->increments('id')->unique();
           $mytable->date('date_dep');
           $mytable->date('date_arr') ;
           $mytable->integer('prices');
           $mytable->string('nbr_nuit');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::drop('price');
    }
}
