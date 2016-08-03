<?php

namespace App\Cesudesk\Modulo;

interface ModuloRepositoryContract
{
    public function getAll();
    public function find($id);
    public function save($modulo);
    public function update($modulo, $id);
    public function store($modulo);
    public function delete($id);
}
