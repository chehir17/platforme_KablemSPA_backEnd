<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateRapportncsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('rapportncs', function (Blueprint $table) {
            $table->bigIncrements('id_rapportnc');
            $table->string('nr_fnc');
            $table->Integer('qte_lot');
            $table->Integer('qte_nc');
            $table->string('process');
            $table->string('occurance_defaut');
            $table->string('sujet_non_conformite');

           

            $table->BigInteger('id_client')->unsigned();
            $table->BigInteger('id_article')->unsigned();
       

         $table->foreign('id_client')->references('id_client')->on('clients')->onDelete('cascade')->onUpdate('cascade');



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
        Schema::dropIfExists('rapportncs');
    }
}
