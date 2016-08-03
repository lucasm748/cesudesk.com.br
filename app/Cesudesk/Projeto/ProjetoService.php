<?php

namespace App\Cesudesk\Projeto;
use App\Cesudesk\Projeto\ProjetoServiceContract;
use App\Cesudesk\Projeto\ProjetoRepositoryContract;

class ProjetoService implements ProjetoServiceContract
{
    /**
    *Intancia de Projeto Repository
    * @var App\Cesudesk\Projeto\ProjetoRepositoryContract
    */
    protected $projetoRepository;
    /**
    * Instancia da Classe ProjetoRepositoryContract
    *
    * @param App\Cesudesk\Projeto\ProjetoRepositoryContract
    * @param ProjetoRepositoryContract
    */
    public function __construct(ProjetoRepositoryContract $projetoRepository)
    {
        $this->projetoRepository = $projetoRepository;
    }

    public function getAll()
    {
       return $this->projetoRepository->getAll();
    }
    public function find($id)
    {
        return $this->projetoRepository->find($id);
    }
    public function save($projeto)
    {

    }
    public function update($projeto, $id)
    {
        return $this->projetoRepository->update($projeto, $id);
    }
    public function store($projeto)
    {
        return $this->projetoRepository->store($projeto);
    }
    public function delete($id)
    {
        return $this->projetoRepository->delete($id);
    }
}
