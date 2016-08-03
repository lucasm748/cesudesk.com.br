<?php

namespace App\Cesudesk\Equipe;
use App\Cesudesk\Equipe\EquipeServiceContract;
use App\Cesudesk\Equipe\EquipeRepositoryContract;

class EquipeService implements EquipeServiceContract
{
    /**
    *Intancia de Equipe Repository
    * @var App\Cesudesk\Equipe\EquipeRepositoryContract
    */
    protected $equipeRepository;
    /**
    * Instancia da Classe EquipeRepositoryContract
    *
    * @param App\Cesudesk\Equipe\EquipeRepositoryContract
    * @param EquipeRepositoryContract
    */
    public function __construct(EquipeRepositoryContract $equipeRepository)
    {
        $this->equipeRepository = $equipeRepository;
    }

    public function getAll()
    {
       return $this->equipeRepository->getAll();
    }
    public function find($id)
    {
        return $this->equipeRepository->find($id);
    }
    public function save($equipe)
    {

    }
    public function update($equipe, $id)
    {
        return $this->equipeRepository->update($equipe, $id);
    }
    public function store($equipe)
    {
        return $this->equipeRepository->store($equipe);
    }
    public function delete($id)
    {
        return $this->equipeRepository->delete($id);
    }
}
