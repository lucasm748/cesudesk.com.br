<?php

namespace App\Cesudesk\Execucao;
use App\Cesudesk\Execucao\ExecucaoServiceContract;
use App\Cesudesk\Execucao\ExecucaoRepositoryContract;

class ExecucaoService implements ExecucaoServiceContract
{
    /**
    *Intancia de ALuno Repository
    * @var App\Cesudesk\Execucao\ExecucaoRepositoryContract
    */
    protected $execucaoRepository;
    /**
    * Instancia da Classe ExecucaoRepositoryContract
    *
    * @param App\Cesudesk\Execucao\ExecucaoRepositoryContract
    * @param ExecucaoRepositoryContract
    */
    public function __construct(ExecucaoRepositoryContract $execucaoRepository)
    {
        $this->execucaoRepository = $execucaoRepository;
    }

    public function getAll()
    {
       return $this->execucaoRepository->getAll();
    }
    public function find($id)
    {
        return $this->execucaoRepository->find($id);
    }
    public function save($execucao)
    {

    }
    public function update($execucao, $id)
    {
        return $this->execucaoRepository->update($execucao, $id);
    }
    public function store($execucao)
    {
        return $this->execucaoRepository->store($execucao);
    }
    public function delete($id)
    {
        return $this->execucaoRepository->delete($id);
    }
}
