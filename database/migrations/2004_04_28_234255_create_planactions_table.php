<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreatePlanactionsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('planactions', function (Blueprint $table) {
            $table->bigIncrements('id_planaction');
           
            $table->string('prob');
            $table->string('cause');
            $table->string('support');
            $table->date('date_debut');
            $table->date('date_cloture');
            $table->string('status');
            $table->string('contol_effic');
            $table->string('progress');
            $table->string('annul');


             $table->BigInteger('id_user')->unsigned();
             $table->BigInteger('id_scrap')->unsigned();
             $table->BigInteger('id_rapportnc')->unsigned();
             $table->BigInteger('id_supercontrole')->unsigned();
             $table->BigInteger('id_suivifournisseur')->unsigned();
             $table->BigInteger('id_dmpp')->unsigned();
             $table->BigInteger('id_suiviclient')->unsigned();


           $table->foreign('id_user')->references('id_user')->on('users')->onDelete('cascade')->onUpdate('cascade');
           $table->foreign('id_scrap')->references('id_scrap')->on('scraps')->onDelete('cascade')->onUpdate('cascade');
          $table->foreign('id_rapportnc')->references('id_rapportnc')->on('rapportncs')->onDelete('cascade')->onUpdate('cascade');
           $table->foreign('id_supercontrole')->references('id_supercontrole')->on('supercontroles')->onDelete('cascade')->onUpdate('cascade');
           $table->foreign('id_suivifournisseur')->references('id_suivifournisseur')->on('suivifournisseurs')->onDelete('cascade')->onUpdate('cascade');
           $table->foreign('id_dmpp')->references('id_dmpp')->on('dmpps')->onDelete('cascade')->onUpdate('cascade');
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
        Schema::dropIfExists('planactions');
    }
}
