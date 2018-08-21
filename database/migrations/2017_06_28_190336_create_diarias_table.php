<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateDiariasTable extends Migration
{
  /**
  * Run the migrations.
  *
  * @return void
  */
  public function up()
  {
    Schema::create('diarias', function (Blueprint $table) {
      $table->increments('id');
      $table->string('pcdp')->nullable();
      $table->string('sc')->nullable();
      $table->string('pescodigo')->nullable();
      $table->string('pnome')->nullable();
      $table->string('saram')->nullable();
      $table->string('cpf')->nullable();
      $table->string('banco')->nullable();
      $table->string('agencia')->nullable();
      $table->string('conta')->nullable();
      $table->string('email')->nullable();
      $table->string('datanascimento')->nullable();
      $table->string('enquadramento')->nullable();
      $table->string('identidade')->nullable();
      $table->string('om')->nullable();
      $table->string('telefone')->nullable();
      $table->text('servico')->nullable();
      $table->text('documentos')->nullable();
      $table->text('ne')->nullable();
      $table->text('em_proveito')->nullable();
      $table->text('custeio')->nullable();
      $table->text('valor_total_sem_custo')->nullable();
      $table->text('fim_semana')->nullable();
      $table->text('conveniencia_servico')->nullable();
      $table->text('justificativa')->nullable();
      $table->text('alteracao_servico')->nullable();
      $table->text('justificativa_alteracao')->nullable();
      $table->text('dia')->nullable();
      $table->text('mes')->nullable();
      $table->text('responsavel')->nullable();
      $table->float('val_br_am_rj')->nullable();
      $table->float('qt_br_am_rj')->nullable();
      $table->float('resultado1')->nullable();
      $table->float('val_bh_fl_pa_rc_sl_sp')->nullable();
      $table->float('qt_bh_fl_pa_rc_sl_sp')->nullable();
      $table->float('resultado2')->nullable();
      $table->float('val_capitais')->nullable();
      $table->float('qt_capitais')->nullable();
      $table->float('resultado3')->nullable();
      $table->float('val_cidades')->nullable();
      $table->float('qt_cidades')->nullable();
      $table->float('resultado4')->nullable();
      $table->float('qt_acrescimo')->nullable();
      $table->float('val_ac')->nullable();
      $table->float('desc_a')->nullable();
      $table->float('qt_dias_a')->nullable();
      $table->float('resultado_dias_a')->nullable();
      $table->float('desc_b')->nullable();
      $table->float('qt_dias_b')->nullable();
      $table->float('resultado_dias_b')->nullable();
      $table->float('resultado_total')->nullable();
      $table->text('conforme_previsto')->nullable();
      $table->text('conforme_forca_maior')->nullable();
      $table->float('qt_meia_diaria')->nullable();
      $table->text('localidade_meia_diaria')->nullable();
      $table->float('qt_diaria_completa')->nullable();
      $table->text('localidade_diaria_completa')->nullable();
      $table->float('num_total_acrescimos')->nullable();
      $table->text('restituicao')->nullable();
      $table->float('valor_restituicao')->nullable();
      $table->float('dono')->nullable();
      $table->text('qtn_md')->nullable();
      $table->text('qtn_dc')->nullable();
      $table->rememberToken();
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
    Schema::dropIfExists('diarias');
  }
}
