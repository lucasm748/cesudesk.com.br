<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateTarefaTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('tarefa', function (Blueprint $table) {
            $table->increments('id');
            $table->string('descricao', 4000);
            $table->timestamp('dh_cadastro');
            $table->timestamp('dh_entrega_prev');
            $table->timestamp('dh_fechamento')->nuullable();
            $table->string('ds_info_complementar', 4000)->nullalble();
            $table->integer('prioridade');
            $table->integer('qt_horas_gastas')->default(0);
            $table->string('titulo', 100);
            $table->char('tp_status', 1)->default('A');
            $table->integer('id_modulo')->unsigned();
            $table->foreign('id_modulo')->
                references('id')->
                    on('modulo')->
                    onDelete('restrict');
            $table->integer('id_projeto')->unsigned();
            $table->foreign('id_projeto')->
                references('id')->
                    on('projeto')->
                    onDelete('restrict');
            $table->integer('id_solicitante')->unsigned();
            $table->foreign('id_solicitante')->
                references('id')->
                    on('usuario')->
                    onDelete('restrict');
            $table->integer('id_tipo_tarefa')->unsigned();
            $table->foreign('id_tipo_tarefa')->
                references('id')->
                    on('tipoTarefa')->
                    onDelete('restrict');
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
        Schema::table('tarefa', function (Blueprint $table) {
            Schema::drop('tarefa');
        });
    }
}
