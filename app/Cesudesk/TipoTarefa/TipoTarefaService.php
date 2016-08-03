<?php

namespace App\Cesudesk\TipoTarefa;
use App\Cesudesk\TipoTarefa\TipoTarefaServiceContract;
use App\Cesudesk\TipoTarefa\TipoTarefaRepositoryContract;

class TipoTarefaService implements TipoTarefaServiceContract
{
    /**
    *Intancia de TipoTarefa Repository
    * @var App\Cesudesk\TipoTarefa\TipoTarefaRepositoryContract
    */
    protected $tipoTarefaRepository;
    /**
    * Instancia da Classe TipoTarefaRepositoryContract
    *
    * @param App\Cesudesk\TipoTarefa\TipoTarefaRepositoryContract
    * @param TipoTarefaRepositoryContract
    */
    public function __construct(TipoTarefaRepositoryContract $tipoTarefaRepository)
    {
        $this->tipoTarefaRepository = $tipoTarefaRepository;
    }

    public function getAll()
    {
       return $this->tipoTarefaRepository->getAll();
    }
    public function find($id)
    {
        return $this->tipoTarefaRepository->find($id);
    }
    public function save($tipoTarefa)
    {

    }
    public function update($tipoTarefa, $id)
    {
        return $this->tipoTarefaRepository->update($tipoTarefa, $id);
    }
    public function store($tipoTarefa)
    {
        return $this->tipoTarefaRepository->store($tipoTarefa);
    }
    public function delete($id)
    {
        return $this->tipoTarefaRepository->delete($id);
    }
}
