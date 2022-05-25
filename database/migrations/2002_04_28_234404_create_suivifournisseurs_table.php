<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateSuivifournisseursTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('suivifournisseurs', function (Blueprint $table) {
            $table->bigIncrements('id_suivifournisseur');
            $table->string('desc_prob');
            $table->string('pcs_ko_detecte');
            $table->string('triage');
            $table->Integer('tot_pcs_ko');
            $table->string('decision');
            $table->string('derogation');
            $table->float('cout_tret');
            $table->string('statut');
            $table->string('notes');
            $table->string('piece_joint');

            $table->BigInteger('id_fournisseur')->unsigned();
            $table->BigInteger('id_article')->unsigned();

            $table->foreign('id_fournisseur')->references('id_fournisseur')->on('fournisseurs')->onDelete('cascade')->onUpdate('cascade');
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
        Schema::dropIfExists('suivifournisseurs');
    }
}
