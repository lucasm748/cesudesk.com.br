<?php

namespace App\Cesudesk\Usuario;
use App\Cesudesk\Usuario\UsuarioServiceContract;
use App\Cesudesk\Usuario\UsuarioRepositoryContract;

class UsuarioService implements UsuarioServiceContract
{
    /**
    *Intancia de ALuno Repository
    * @var App\Cesudesk\Usuario\UsuarioRepositoryContract
    */
    protected $usuarioRepository;
    /**
    * Instancia da Classe UsuarioRepositoryContract
    *
    * @param App\Cesudesk\Usuario\UsuarioRepositoryContract
    * @param UsuarioRepositoryContract
    */
    public function __construct(UsuarioRepositoryContract $usuarioRepository)
    {
        $this->usuarioRepository = $usuarioRepository;
    }

    public function getAll()
    {
       return $this->usuarioRepository->getAll();
    }
    public function find($id)
    {
        return $this->usuarioRepository->find($id);
    }
    public function save($usuario)
    {

    }
    public function update($usuario, $id)
    {
        return $this->usuarioRepository->update($usuario, $id);
    }
    public function store($usuario)
    {
        return $this->usuarioRepository->store($usuario);
    }
    public function delete($id)
    {
        return $this->usuarioRepository->delete($id);
    }
}
