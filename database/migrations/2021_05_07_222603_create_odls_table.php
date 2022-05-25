<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateOdlsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('odls', function (Blueprint $table) {
            $table->bigIncrements('id_odl');
            $table->string('odl_rep');
            $table->string('new_odl');
            $table->BigInteger('id_scrap')->unsigned();

           $table->foreign('id_scrap')->references('id_scrap')->on('scraps')->onDelete('cascade')->onUpdate('cascade');

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
        Schema::dropIfExists('odls');
    }
}
