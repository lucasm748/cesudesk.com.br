<?php

namespace App\Cesudesk\Cargo;
use App\Cesudesk\Cargo\CargoServiceContract;
use App\Cesudesk\Cargo\CargoRepositoryContract;

class CargoService implements CargoServiceContract
{
    /**
    *Intancia de Cargo Repository
    * @var App\Cesudesk\Cargo\CargoRepositoryContract
    */
    protected $cargoRepository;
    /**
    * Instancia da Classe CargoRepositoryContract
    *
    * @param App\Cesudesk\Cargo\CargoRepositoryContract
    * @param CargoRepositoryContract
    */
    public function __construct(CargoRepositoryContract $cargoRepository)
    {
        $this->cargoRepository = $cargoRepository;
    }

    public function getAll()
    {
       return $this->cargoRepository->getAll();
    }
    public function find($id)
    {
        return $this->cargoRepository->find($id);
    }
    public function save($cargo)
    {

    }
    public function update($cargo, $id)
    {
        return $this->cargoRepository->update($cargo, $id);
    }
    public function store($cargo)
    {
        return $this->cargoRepository->store($cargo);
    }
    public function delete($id)
    {
        return $this->cargoRepository->delete($id);
    }
}
