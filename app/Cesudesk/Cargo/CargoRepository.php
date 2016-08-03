<?php

namespace App\Cesudesk\Cargo;
use App\Cesudesk\Cargo\Cargo;
use App\Cesudesk\Cargo\CargoRepositoryContract;

class CargoRepository implements CargoRepositoryContract
{
    /**
    *
    * @var App\Cesudesk\Cargo\Cargo
    */
    protected $cargo;
    /**
    * Instancia da Classe CargoRepositoryContract
    *
    * @param App\Cesudesk\Cargo\Cargo
    * @param Cargo
    */
    public function __construct(Cargo $cargo)
    {
        $this->cargo = $cargo;
    }

    public function getAll()
    {
       return $this->cargo->all();
    }

    public function find($id)
    {
        return $this->cargo->findOrFail($id);
    }

    public function save($cargo)
    {

    }

    public function update($cargo, $id)
    {
        $data = $this->cargo->findOrFail($id);
        $data['active'] = (\Request::has('active')) ? true : false;
        return $data->update($cargo);
    }
    public function store($cargo)
    {
      return $this->cargo->create($cargo);
    }
     public function delete($id)
    {
        $item =  $this->cargo->findOrFail($id);
        return $item->destroy($id);
    }
}
