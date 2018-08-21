<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateTrechosTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('trechos', function (Blueprint $table) {
          $table->increments('id');
          $table->integer('diaria_id');
          $table->foreign('diaria_id')->references('id')->on('diarias')->onDelete('cascade');
          $table->text('houve_pernoite')->nullable();
          $table->text('local_servico')->nullable();
          $table->text('qt_pernoite')->nullable();
          $table->text('local_pernoite')->nullable();
          $table->text('data_afastamento_inicio')->nullable();
          $table->text('hora_afastamento_inicio')->nullable();
          $table->text('data_afastamento_retorno')->nullable();
          $table->text('hora_afastamento_retorno')->nullable();
          $table->text('adicional_deslocamento')->nullable();
          $table->text('total_acrescimos')->nullable();
          $table->text('valor_total')->nullable();
          $table->text('ck_valor_total')->nullable();
          $table->text('t_s')->nullable();
          $table->text('a_s')->nullable();
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
        Schema::dropIfExists('trechos');
    }
}
