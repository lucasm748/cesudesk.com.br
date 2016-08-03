<?php

namespace App\Cesudesk\TipoTarefa;

interface TipoTarefaServiceContract
{
    public function getAll();
    public function find($id);
    public function save($tipoTarefa);
    public function update($tipoTarefa, $id);
    public function store($tipoTarefa);
    public function delete($id);
}
