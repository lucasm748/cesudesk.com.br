<?php

namespace App\Cesudesk\Anexo;

interface AnexoServiceContract
{
    public function getAll();
    public function find($id);
    public function save($anexo);
    public function update($anexo, $id);
    public function store($anexo);
    public function delete($id);
}
