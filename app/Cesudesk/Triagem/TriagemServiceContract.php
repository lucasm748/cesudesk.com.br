<?php

namespace App\Cesudesk\Triagem;

interface TriagemServiceContract
{
    public function getAll();
    public function find($id);
    public function save($triagem);
    public function update($triagem, $id);
    public function store($triagem);
    public function delete($id);
}
