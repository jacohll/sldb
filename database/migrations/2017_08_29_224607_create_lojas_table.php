<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateLojasTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('tb_loja', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('user_id')->unsigned()->nullable(false);
            $table->string('razao_social')->nullable(false);
            $table->string('nome_fantasia')->nullable(false);
            $table->string('nome_representante')->nullable(false);
            $table->string('cpf_representante')->nullable(false);
            $table->string('cnpj')->nullable(false);
            $table->string('cidade')->nullable(false);
            $table->string('estado')->nullable(false);
            $table->string('bairro')->nullable(false);
            $table->string('endereco')->nullable(false);
            $table->string('telefone')->nullable(false);
            $table->string('telefone2')->nullable(true);
            $table->timestamps();
        });

        Schema::table('tb_loja', function (Blueprint $table) {

            $table->foreign('user_id')
                ->references('id')
                ->on('tb_usuario')
                ->onDelete('cascade');

        });

        Schema::table('tb_loja', function (Blueprint $table) {
            $table->boolean('fl_ativo')->default(false)->after('telefone2');
        });

    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('tb_loja');
        Schema::table('tb_loja', function (Blueprint $table) {
            $table->dropColumn('fl_ativo');
        });
    }
}
