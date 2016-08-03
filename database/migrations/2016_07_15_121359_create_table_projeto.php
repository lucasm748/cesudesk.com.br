<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateTableProjeto extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('projeto', function(Blueprint $table) {
            $table->increments('id');
            $table->string('descricao', 100);
            $table->date('dh_inicio');
            $table->date('dh_fechamento')->nullable();
            $table->boolean('active')->default(true);
            $table->string('ds_info_complementar',255)->nullable();
            $table->char('tp_status', 4);
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
        //
    }
}
