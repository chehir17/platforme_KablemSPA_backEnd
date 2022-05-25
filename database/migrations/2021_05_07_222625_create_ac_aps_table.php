<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateAcApsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('ac_aps', function (Blueprint $table) {
            $table->bigIncrements('id_acap');
            $table->string('acap');
            $table->string('type');
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
        Schema::dropIfExists('ac_aps');
    }
}
