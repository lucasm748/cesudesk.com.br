<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateTableTriagem extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('triagem', function (Blueprint $table) {
            $table->increments('id');
            $table->string('descricao', 200);
            $table->string('ds_info_complementar', 4000);
            $table->timestamp('dh_inicio_triagem')->default(\DB::raw('CURRENT_TIMESTAMP'));
            $table->timestamp('dh_fim_triagem')->nullable();
            $table->integer('qt_horas')->default(0);
            $table->char('tp_status',1)->default('A');
            $table->integer('id_tarefa')->unsigned();
            $table->foreign('id_tarefa')->
                references('id')->
                    on('tarefa')->
                    onDelete('restrict');
            $table->integer('id_usuario')->unsigned();
            $table->foreign('id_usuario')->
                references('id')->
                    on('tarefa')->
                    onDelete('restrict');
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
        Schema::drop('triagem');
    }
}
