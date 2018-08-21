<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class AlterAddTranps extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
      Schema::table('diarias', function (Blueprint $table) {
        $table->text('ax_t') // Nome da coluna
                ->nullable(); // Preenchimento nÃ£o obrigatÃ³rio
                $table->text('ax_a') // Nome da coluna
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
