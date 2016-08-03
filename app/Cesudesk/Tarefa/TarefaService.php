<?php

namespace App\Cesudesk\Tarefa;
use App\Cesudesk\Tarefa\TarefaServiceContract;
use App\Cesudesk\Tarefa\TarefaRepositoryContract;

class TarefaService implements TarefaServiceContract
{
    /**
    *Intancia de ALuno Repository
    * @var App\Cesudesk\Tarefa\TarefaRepositoryContract
    */
    protected $tarefaRepository;
    /**
    * Instancia da Classe TarefaRepositoryContract
    *
    * @param App\Cesudesk\Tarefa\TarefaRepositoryContract
    * @param TarefaRepositoryContract
    */
    public function __construct(TarefaRepositoryContract $tarefaRepository)
    {
        $this->tarefaRepository = $tarefaRepository;
    }

    public function getAll()
    {
       return $this->tarefaRepository->getAll();
    }
    public function find($id)
    {
        return $this->tarefaRepository->find($id);
    }
    public function save($tarefa)
    {

    }
    public function update($tarefa, $id)
    {
        return $this->tarefaRepository->update($tarefa, $id);
    }
    public function store($tarefa)
    {
        return $this->tarefaRepository->store($tarefa);
    }
    public function delete($id)
    {
        return $this->tarefaRepository->delete($id);
    }
}
