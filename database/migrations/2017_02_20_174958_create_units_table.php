<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateUnitsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('units', function (Blueprint $table) {
            $table->increments('idunidade');
            $table->string('nome',60);
            $table->string('cep',9)->nullable();
            $table->string('logradouro',200)->nullable();
            $table->string('complemento',200)->nullable();
            $table->string('bairro',50)->nullable();
            $table->string('localidade',50)->nullable();
            $table->string('uf',2)->nullable();
            $table->string('ibge',8)->nullable();
            $table->string('numero',9)->nullable();
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
        Schema::dropIfExists('units');
    }
}
