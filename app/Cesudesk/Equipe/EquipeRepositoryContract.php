<?php

namespace App\Cesudesk\Equipe;

interface EquipeRepositoryContract
{
    public function getAll();
    public function find($id);
    public function save($equipe);
    public function update($equipe, $id);
    public function store($equipe);
    public function delete($id);
}
