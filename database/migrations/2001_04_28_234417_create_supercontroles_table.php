<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateSupercontrolesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('supercontroles', function (Blueprint $table) {
            $table->bigIncrements('id_supercontrole');
            $table->string('rev-projet');
            $table->string('type-controle');
            $table->string('doc-réfirance');
            $table->string('methode-controle');
            $table->date('date-début');
            $table->date('durée-estimé');
            $table->string('traçibilité-cablage');
            $table->string('traçibilité-carton');
            $table->float('heurs-internedépensées');
            $table->date('date-final');

            $table->BigInteger('id_article')->unsigned();
            $table->BigInteger('id_client')->unsigned();

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
        Schema::dropIfExists('supercontroles');
    }
}
