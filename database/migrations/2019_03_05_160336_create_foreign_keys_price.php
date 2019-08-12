<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateForeignKeysPrice extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('price', function(Blueprint $table) {
            $table->unsignedInteger ('id_hotel')->nullable();
            $table->foreign('id_hotel')->references('id')->on('hotels') ;
            $table->unsignedInteger ('id_arr')->nullable();
            $table->foreign('id_arr')->references('id')->on('arrangement') ;

        });
        }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('foreign_keys_price');
    }
}
