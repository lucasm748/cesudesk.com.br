<?php

namespace App\Cesudesk\Modulo;

interface ModuloServiceContract
{
    public function getAll();
    public function find($id);
    public function save($modulo);
    public function update($modulo, $id);
    public function store($modulo);
    public function delete($id);
}
