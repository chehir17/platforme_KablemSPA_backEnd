<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateDmppsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('dmpps', function (Blueprint $table) {
            $table->bigIncrements('id_dmpp');
            $table->string('post');
            $table->string('nature');
            $table->string('zone');
            $table->date('date_sou');
            $table->string('type');
            $table->float('cout_estimative');
            $table->string('etat_actu');
            $table->string('etat_modif');
            $table->string('objectif_modif');
            
            $table->BigInteger('id_ligne')->unsigned();
            $table->BigInteger('id_article')->unsigned();
            $table->BigInteger('id_client')->unsigned();

            $table->foreign('id_ligne')->references('id_ligne')->on('lignes')->onDelete('cascade')->onUpdate('cascade');
            $table->foreign('id_article')->references('id_article')->on('articles')->onDelete('cascade')->onUpdate('cascade');
            $table->foreign('id_client')->references('id_client')->on('clients')->onDelete('cascade')->onUpdate('cascade');


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
        Schema::dropIfExists('dmpps');
    }
}
