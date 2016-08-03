<?php

namespace App\Cesudesk\Cargo;

interface CargoServiceContract
{
    public function getAll();
    public function find($id);
    public function save($cargo);
    public function update($cargo, $id);
    public function store($cargo);
    public function delete($id);
}
