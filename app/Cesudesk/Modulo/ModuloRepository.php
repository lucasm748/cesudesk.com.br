<?php

namespace App\Cesudesk\Modulo;
use App\Cesudesk\Modulo\Modulo;
use App\Cesudesk\Modulo\ModuloRepositoryContract;

class ModuloRepository implements ModuloRepositoryContract
{
    /**
    *
    * @var App\Cesudesk\Modulo\Modulo
    */
    protected $modulo;
    /**
    * Instancia da Classe ModuloRepositoryContract
    *
    * @param App\Cesudesk\Modulo\Modulo
    * @param Modulo
    */
    public function __construct(Modulo $modulo)
    {
        $this->modulo = $modulo;
    }

    public function getAll()
    {
       return $this->modulo->all();
    }

    public function find($id)
    {
        return $this->modulo->findOrFail($id);
    }

    public function save($modulo)
    {

    }

    public function update($modulo, $id)
    {
        $data = $this->modulo->findOrFail($id);
        $data['active'] = (\Request::has('active')) ? true : false;
        return $data->update($modulo);
    }
    public function store($modulo)
    {
      return $this->modulo->create($modulo);
    }
     public function delete($id)
    {
        $item =  $this->modulo->findOrFail($id);
        return $item->destroy($id);
    }
}
