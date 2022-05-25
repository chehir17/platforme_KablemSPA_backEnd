<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateSuiviclientsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('suiviclients', function (Blueprint $table) {
            $table->bigIncrements('id_suiviclient');
            $table->string('num_rec_cli');
            $table->date('date_rec_cli');
            $table->string('zone');
            $table->string('desc_deff');
            $table->Integer('nbr_piec_ko');
            $table->string('type_incidant');
            $table->string('recurence');
            $table->string('statut');
            $table->float('cout_non_quat_s_rec');

            $table->BigInteger('id_client')->unsigned();
            $table->BigInteger('id_suivifournisseur')->unsigned();
            $table->BigInteger('id_article')->unsigned();
           

    $table->foreign('id_client')->references('id_client')->on('clients')->onDelete('cascade')->onUpdate('cascade');
            $table->foreign('id_suivifournisseur')->references('id_suivifournisseur')->on('suivifournisseurs')->onDelete('cascade')->onUpdate('cascade');
            $table->foreign('id_article')->references('id_article')->on('articles')->onDelete('cascade')->onUpdate('cascade');
           

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
        Schema::dropIfExists('suiviclients');
    }
}
