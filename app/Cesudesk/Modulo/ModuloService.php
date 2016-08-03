<?php

namespace App\Cesudesk\Modulo;
use App\Cesudesk\Modulo\ModuloServiceContract;
use App\Cesudesk\Modulo\ModuloRepositoryContract;

class ModuloService implements ModuloServiceContract
{
    /**
    *Intancia de Modulo Repository
    * @var App\Cesudesk\Modulo\ModuloRepositoryContract
    */
    protected $moduloRepository;
    /**
    * Instancia da Classe ModuloRepositoryContract
    *
    * @param App\Cesudesk\Modulo\ModuloRepositoryContract
    * @param ModuloRepositoryContract
    */
    public function __construct(ModuloRepositoryContract $moduloRepository)
    {
        $this->moduloRepository = $moduloRepository;
    }

    public function getAll()
    {
       return $this->moduloRepository->getAll();
    }
    public function find($id)
    {
        return $this->moduloRepository->find($id);
    }
    public function save($modulo)
    {

    }
    public function update($modulo, $id)
    {
        return $this->moduloRepository->update($modulo, $id);
    }
    public function store($modulo)
    {
        return $this->moduloRepository->store($modulo);
    }
    public function delete($id)
    {
        return $this->moduloRepository->delete($id);
    }
}
