<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateScrapsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('scraps', function (Blueprint $table) {
            $table->bigIncrements('id_scrap');
            $table->string('zone_affe_prob');
            $table->string('annulation');
            $table->string('desc_prob');
            $table->float('cout_unit');
            $table->string('machine');
            $table->string('mini');
            $table->string('table_elec');
            $table->Integer('qnt_scrap');
            $table->string('valeur_scrap');
            $table->string('cause_prob');
            $table->string('classification_cause');
            $table->string('ac_immed_prend');
            $table->string('rebut_remplacer');
            $table->string('Desc_acmo');
            $table->Integer('N_pecRec');
            $table->Integer('qnt_rebF');
            $table->Integer('h_interne');
            $table->Integer('h_externe');
            $table->float('cout_final');
            $table->string('res_pos');
            $table->string('ac_corr_suppl');
            $table->Integer('N_ac_corr_ex');
            $table->string('note');
            $table->float('poids_rebut');

            $table->BigInteger('id_lot')->unsigned();
            $table->BigInteger('id_ligne')->unsigned();
            $table->BigInteger('id_user')->unsigned();


          $table->foreign('id_ligne')->references('id_ligne')->on('lignes')->onDelete('cascade')->onUpdate('cascade');
         $table->foreign('id_lot')->references('id_lot')->on('lots')->onDelete('cascade')->onUpdate('cascade');
           $table->foreign('id_user')->references('id_user')->on('users')->onDelete('cascade')->onUpdate('cascade');
           // => select le code article avec une jointure de tableau lot  
           /* $table->date('date_comp');   => created at */
          /*$table->date('date_prod');  =>  trouve au tableau Lot */ 
                  /*  $table->string('code_artc');
          $table->string('compilateur');*/

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
        Schema::dropIfExists('scraps');
    }
}
