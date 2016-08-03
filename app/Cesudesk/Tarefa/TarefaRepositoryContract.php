<?php

namespace App\Cesudesk\Tarefa;

interface TarefaRepositoryContract
{
    public function getAll();
    public function find($id);
    public function save($tarefa);
    public function update($tarefa, $id);
    public function store($tarefa);
    public function delete($id);
}
