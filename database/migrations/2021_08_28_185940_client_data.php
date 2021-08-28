<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class ClientData extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('client_data', function (Blueprint $table) {
            $table->id();
            $table->string('title');
            $table->string('fullname');
            $table->string('country');
            $table->string('state');
            $table->string('city');
            $table->string('street');
            $table->string('bus_stop');
            $table->string('phone_number');
            $table->string('email');
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
        Schema::dropIfExists('client_data');
    }
}
