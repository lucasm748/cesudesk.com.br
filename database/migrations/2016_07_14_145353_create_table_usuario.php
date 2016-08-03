<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateTableUsuario extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('usuario', function(Blueprint $table) {
            $table->increments('id');
            $table->string('nome', 255);
            $table->string('login', 100)->unique();
            $table->string('password', 255);
            $table->string('email', 130)->unique();
            $table->boolean('active')->default(true);
            $table->integer('id_cargo')->unsigned();
            $table->foreign('id_cargo')->
                references('id')->
                    on('cargo')->
                    onDelete('restrict');
            $table->integer('id_equipe')->unsigned();
            $table->foreign('id_equipe')->
                references('id')->
                    on('equipe')->
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
        //
    }
}
