<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateTableExecucao extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('execucao', function (Blueprint $table) {
            $table->increments('id');
            $table->timestamp('dh_inicio')->default(\DB::raw('CURRENT_TIMESTAMP'));
            $table->timestamp('dh_fim')->nullable();
            $table->integer('id_triagem')->unsigned();
            $table->foreign('id_triagem')->
                references('id')->
                    on('triagem')->
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
        Schema::drop('execucao');
    }
}
