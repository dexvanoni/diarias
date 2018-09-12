<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateChefesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
      Schema::create('diarias.chefes', function (Blueprint $table) {
        $table->increments('id');
        $table->string('posto_grad')->nullable();
        $table->string('nome_completo')->nullable();
        $table->string('nome_guerra')->nullable();
        $table->string('cargo')->nullable();
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
        Schema::dropIfExists('diarias.chefes');
    }
}
