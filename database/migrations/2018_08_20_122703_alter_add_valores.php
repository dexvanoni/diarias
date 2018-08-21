<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class AlterAddValores extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
      Schema::table('diarias', function (Blueprint $table) {
      $table->text('adicional_deslocamento') // Nome da coluna
              ->nullable(); // Preenchimento nÃ£o obrigatÃ³rio
              $table->text('total_acrescimos') // Nome da coluna
                      ->nullable(); // Preenchimento nÃ£o obrigatÃ³rio
                      $table->text('valor_total') // Nome da coluna
                              ->nullable(); // Preenchimento nÃ£o obrigatÃ³rio
                              $table->text('ck_valor_total') // Nome da coluna
                                      ->nullable(); // Preenchimento nÃ£o obrigatÃ³rio
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
