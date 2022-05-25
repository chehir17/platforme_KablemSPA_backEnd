<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateActionImmedsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('action_immeds', function (Blueprint $table) {
            $table->bigIncrements('id_actionimmed');
            $table->string('ac_immed');
            $table->date('date_ac_immed');
            $table->date('date_verf_ac_immed');
            $table->BigInteger('id_rapportnc')->unsigned();
            $table->foreign('id_rapportnc')->references('id_rapportnc')->on('rapportncs')->onDelete('cascade')->onUpdate('cascade');

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
        Schema::dropIfExists('action_immeds');
    }
}
