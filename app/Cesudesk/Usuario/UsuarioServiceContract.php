<?php

namespace App\Cesudesk\Usuario;

interface UsuarioServiceContract
{
    public function getAll();
    public function find($id);
    public function save($usuario);
    public function update($usuario, $id);
    public function store($usuario);
    public function delete($id);
}
