<?php

namespace App\Cesudesk\Triagem;
use App\Cesudesk\Triagem\TriagemServiceContract;
use App\Cesudesk\Triagem\TriagemRepositoryContract;

class TriagemService implements TriagemServiceContract
{
    /**
    *Intancia de ALuno Repository
    * @var App\Cesudesk\Triagem\TriagemRepositoryContract
    */
    protected $triagemRepository;
    /**
    * Instancia da Classe TriagemRepositoryContract
    *
    * @param App\Cesudesk\Triagem\TriagemRepositoryContract
    * @param TriagemRepositoryContract
    */
    public function __construct(TriagemRepositoryContract $triagemRepository)
    {
        $this->triagemRepository = $triagemRepository;
    }

    public function getAll()
    {
       return $this->triagemRepository->getAll();
    }
    public function find($id)
    {
        return $this->triagemRepository->find($id);
    }
    public function save($triagem)
    {

    }
    public function update($triagem, $id)
    {
        return $this->triagemRepository->update($triagem, $id);
    }
    public function store($triagem)
    {
        return $this->triagemRepository->store($triagem);
    }
    public function delete($id)
    {
        return $this->triagemRepository->delete($id);
    }
}
