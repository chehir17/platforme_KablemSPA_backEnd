<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreatePhotoSuiviClientsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('photo_suivi_clients', function (Blueprint $table) {
            $table->bigIncrements('id_photoSuiviClients');
            $table->string('photo_ok');
            $table->string('photo_nok');

            $table->BigInteger('id_suiviclient')->unsigned();
           $table->foreign('id_suiviclient')->references('id_suiviclient')->on('suiviclients')->onDelete('cascade')->onUpdate('cascade');
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
        Schema::dropIfExists('photo_suivi_clients');
    }
}
