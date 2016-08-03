<?php

namespace App\Cesudesk\TipoTarefa;
use App\Cesudesk\TipoTarefa\TipoTarefa;
use App\Cesudesk\TipoTarefa\TipoTarefaRepositoryContract;

class TipoTarefaRepository implements TipoTarefaRepositoryContract
{
    /**
    *
    * @var App\Cesudesk\TipoTarefa\TipoTarefa
    */
    protected $tipoTarefa;
    /**
    * Instancia da Classe TipoTarefaRepositoryContract
    *
    * @param App\Cesudesk\TipoTarefa\TipoTarefa
    * @param TipoTarefa
    */
    public function __construct(TipoTarefa $tipoTarefa)
    {
        $this->tipoTarefa = $tipoTarefa;
    }

    public function getAll()
    {
       return $this->tipoTarefa->all();
    }

    public function find($id)
    {
        return $this->tipoTarefa->findOrFail($id);
    }

    public function save($tipoTarefa)
    {

    }

    public function update($tipoTarefa, $id)
    {
        $data = $this->tipoTarefa->findOrFail($id);
        return $data->update($tipoTarefa);
    }
    public function store($tipoTarefa)
    {
      return $this->tipoTarefa->create($tipoTarefa);
    }
     public function delete($id)
    {
        $item =  $this->tipoTarefa->findOrFail($id);
        return $item->destroy($id);
    }
}
