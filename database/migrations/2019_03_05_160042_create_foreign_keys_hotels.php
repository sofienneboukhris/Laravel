<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateForeignKeysHotels extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('hotels', function(Blueprint $table) {
            $table->unsignedInteger ('ville_id')->nullable();
            $table->foreign('ville_id')->references('id')->on('ville') ;

        });

    }


    public function down()
    {
        Schema::dropIfExists('foreign_keys_hotels');
    }
}
