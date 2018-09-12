<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class AlterTableDiarias extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
      Schema::table('diarias.diarias', function ($table) {
        $table->string('val_br_am_rj')->change()->nullable();
        $table->string('qt_br_am_rj')->change()->nullable();
        $table->string('resultado1')->change()->nullable();
        $table->string('val_bh_fl_pa_rc_sl_sp')->change()->nullable();
        $table->string('qt_bh_fl_pa_rc_sl_sp')->change()->nullable();
        $table->string('resultado2')->change()->nullable();
        $table->string('val_capitais')->change()->nullable();
        $table->string('qt_capitais')->change()->nullable();
        $table->string('resultado3')->change()->nullable();
        $table->string('val_cidades')->change()->nullable();
        $table->string('qt_cidades')->change()->nullable();
        $table->string('resultado4')->change()->nullable();
        $table->string('qt_acrescimo')->change()->nullable();
        $table->string('val_ac')->change()->nullable();
        $table->string('desc_a')->change()->nullable();
        $table->string('qt_dias_a')->change()->nullable();
        $table->string('resultado_dias_a')->change()->nullable();
        $table->string('desc_b')->change()->nullable();
        $table->string('qt_dias_b')->change()->nullable();
        $table->string('resultado_dias_b')->change()->nullable();
        $table->string('resultado_total')->change()->nullable();
        $table->string('qt_meia_diaria')->change()->nullable();
        $table->string('qt_diaria_completa')->change()->nullable();
        $table->string('num_total_acrescimos')->change()->nullable();
        $table->string('valor_restituicao')->change()->nullable();
        $table->string('dono')->change()->nullable();
      });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        //
    }
}
