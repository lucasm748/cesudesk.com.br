<?php

namespace App\Cesudesk\Equipe;
use App\Cesudesk\Equipe\Equipe;
use App\Cesudesk\Equipe\EquipeRepositoryContract;

class EquipeRepository implements EquipeRepositoryContract
{
    /**
    *
    * @var App\Cesudesk\Equipe\Equipe
    */
    protected $equipe;
    /**
    * Instancia da Classe EquipeRepositoryContract
    *
    * @param App\Cesudesk\Equipe\Equipe
    * @param Equipe
    */
    public function __construct(Equipe $equipe)
    {
        $this->equipe = $equipe;
    }

    public function getAll()
    {
       return $this->equipe->all();
    }

    public function find($id)
    {
        return $this->equipe->findOrFail($id);
    }

    public function save($equipe)
    {

    }

    public function update($equipe, $id)
    {
        $data = $this->equipe->findOrFail($id);
        $data['active'] = (\Request::has('active')) ? true : false;
        return $data->update($equipe);
    }
    public function store($equipe)
    {
      return $this->equipe->create($equipe);
    }
     public function delete($id)
    {
        $item =  $this->equipe->findOrFail($id);
        return $item->destroy($id);
    }
}
