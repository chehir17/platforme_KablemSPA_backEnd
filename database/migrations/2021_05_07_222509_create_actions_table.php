<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateActionsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('actions', function (Blueprint $table) {
            $table->bigIncrements('id_action');
            
            $table->string('zone');
            $table->string('origine');
            $table->string('action');
            $table->Integer('statue');

            $table->BigInteger('id_planaction')->unsigned();    
            $table->BigInteger('id_departement')->unsigned();    
            $table->foreign('id_planaction')->references('id_planaction')->on('planactions')->onDelete('cascade')->onUpdate('cascade');
            $table->foreign('id_departement')->references('id_departement')->on('departements')->onDelete('cascade')->onUpdate('cascade');
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
        Schema::dropIfExists('actions');
    }
}
