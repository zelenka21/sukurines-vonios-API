<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddUsersApartmentsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        
        Schema::create('apartments_owners', function( Blueprint $table ){
          $table->unsignedBigInteger('user_ap_id');
          $table->foreign('user_ap_id')->references('id')->on('users')->onDelete('cascade');
          $table->unsignedBigInteger('apartment_us_id');
          $table->foreign('apartment_us_id')->references('id')->on('apartments')->onDelete('cascade');

        });


    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
         Schema::drop('apartments_owners');
    }
}
