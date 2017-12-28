<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateReservationTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('reservation', function (Blueprint $table) {


            $table->increments('id');
            $table->string('name');
            $table->string('prenom');
            $table->string('email');
            $table->integer('Age');
            $table->string('telephone');
            $table->integer('nombre');
            //$table->string('Type_paye');
            $table->integer('verifie');
            $table->boolean('Type_etage');
            $table->dateTime('date_deb');
            $table->dateTime('date_fin');
            $table->date('date_d');
            $table->time('heure_d');
            $table->date('date_f');
            $table->time('heure_f');
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
        Schema::dropIfExists('reservation');
    }
}
