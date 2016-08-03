<?php

namespace App\Cesudesk\TipoTarefa;

interface TipoTarefaRepositoryContract
{
    public function getAll();
    public function find($id);
    public function save($tipoTarefa);
    public function update($tipoTarefa, $id);
    public function store($tipoTarefa);
    public function delete($id);
}
