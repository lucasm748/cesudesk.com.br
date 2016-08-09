<?php
Route::post('tarefa/salvar', 'TarefaController@store');
Route::resource('tarefas','TarefaController');



