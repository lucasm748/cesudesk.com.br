<?php

namespace App\Cesudesk\Tarefa;
use App\Cesudesk\Tarefa\Tarefa;
use App\Cesudesk\Tarefa\TarefaRepositoryContract;

class TarefaRepository implements TarefaRepositoryContract
{
    /**
    *
    * @var App\Cesudesk\Tarefa\Tarefa
    */
    protected $tarefa;
    /**
    * Instancia da Classe TarefaRepositoryContract
    *
    * @param App\Cesudesk\Tarefa\Tarefa
    * @param Tarefa
    */
    public function __construct(Tarefa $tarefa)
    {
        $this->tarefa = $tarefa;
    }

    public function getAll()
    {
       return $this->tarefa->all();
    }

    public function find($id)
    {
        return $this->tarefa->findOrFail($id);
    }

    public function save($tarefa)
    {
        return 'metodo save não implementado';
    }

    public function update($tarefa, $id)
    {
        $data = $this->tarefa->findOrFail($id);
        return $data->update($tarefa);
    }
    public function store($tarefa)
    {
      return $this->tarefa->create($tarefa);
    }
     public function delete($id)
    {
        $item =  $this->tarefa->findOrFail($id);
        return $item->destroy($id);
    }
}
