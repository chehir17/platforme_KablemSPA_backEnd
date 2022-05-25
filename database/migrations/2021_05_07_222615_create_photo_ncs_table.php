<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreatePhotoNcsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('photo_ncs', function (Blueprint $table) {
            $table->bigIncrements('id_photo_nc');
            $table->string('photo_ok');
            $table->string('photo_nok');
            $table->string('photo_idant');
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
        Schema::dropIfExists('photo_ncs');
    }
}
