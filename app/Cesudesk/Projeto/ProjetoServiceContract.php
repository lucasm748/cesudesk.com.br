<?php

namespace App\Cesudesk\Projeto;

interface ProjetoServiceContract
{
    public function getAll();
    public function find($id);
    public function save($projeto);
    public function update($projeto, $id);
    public function store($projeto);
    public function delete($id);
}
