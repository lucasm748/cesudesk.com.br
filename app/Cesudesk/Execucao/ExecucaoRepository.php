<?php

namespace App\Cesudesk\Execucao;
use App\Cesudesk\Execucao\Execucao;
use App\Cesudesk\Execucao\ExecucaoRepositoryContract;

class ExecucaoRepository implements ExecucaoRepositoryContract
{
    /**
    *
    * @var App\Cesudesk\Execucao\Execucao
    */
    protected $execucao;
    /**
    * Instancia da Classe ExecucaoRepositoryContract
    *
    * @param App\Cesudesk\Execucao\Execucao
    * @param Execucao
    */
    public function __construct(Execucao $execucao)
    {
        $this->execucao = $execucao;
    }

    public function getAll()
    {
       return $this->execucao->all();
    }

    public function find($id)
    {
        return $this->execucao->findOrFail($id);
    }

    public function save($execucao)
    {
        return 'metodo save não implementado';
    }

    public function update($execucao, $id)
    {
        $data = $this->execucao->findOrFail($id);
        return $data->update($execucao);
    }
    public function store($execucao)
    {
      return $this->execucao->create($execucao);
    }
     public function delete($id)
    {
        $item =  $this->execucao->findOrFail($id);
        return $item->destroy($id);
    }
}
