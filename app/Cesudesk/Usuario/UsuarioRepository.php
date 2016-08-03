<?php

namespace App\Cesudesk\Usuario;
use App\Cesudesk\Usuario\Usuario;
use App\Cesudesk\Usuario\UsuarioRepositoryContract;

class UsuarioRepository implements UsuarioRepositoryContract
{
    /**
    *
    * @var App\Cesudesk\Usuario\Usuario
    */
    protected $usuario;
    /**
    * Instancia da Classe UsuarioRepositoryContract
    *
    * @param App\Cesudesk\Usuario\Usuario
    * @param Usuario
    */
    public function __construct(Usuario $usuario)
    {
        $this->usuario = $usuario;
    }

    public function getAll()
    {
       return $this->usuario->all();
    }

    public function find($id)
    {
        return $this->usuario->findOrFail($id);
    }

    public function save($usuario)
    {
        return 'metodo save não implementado';
    }

    public function update($usuario, $id)
    {
        $data = $this->usuario->findOrFail($id);
        $data['active'] = (\Request::has('active')) ? true : false;
        return $data->update($usuario);
    }
    public function store($usuario)
    {
      return $this->usuario->create($usuario);
    }
     public function delete($id)
    {
        $item =  $this->usuario->findOrFail($id);
        return $item->destroy($id);
    }
}
