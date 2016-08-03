<?php

namespace App\Cesudesk\Triagem;
use App\Cesudesk\Triagem\Triagem;
use App\Cesudesk\Triagem\TriagemRepositoryContract;

class TriagemRepository implements TriagemRepositoryContract
{
    /**
    *
    * @var App\Cesudesk\Triagem\Triagem
    */
    protected $triagem;
    /**
    * Instancia da Classe TriagemRepositoryContract
    *
    * @param App\Cesudesk\Triagem\Triagem
    * @param Triagem
    */
    public function __construct(Triagem $triagem)
    {
        $this->triagem = $triagem;
    }

    public function getAll()
    {
       return $this->triagem->all();
    }

    public function find($id)
    {
        return $this->triagem->findOrFail($id);
    }

    public function save($triagem)
    {
        return 'metodo save não implementado';
    }

    public function update($triagem, $id)
    {
        $data = $this->triagem->findOrFail($id);
        return $data->update($triagem);
    }
    public function store($triagem)
    {
      return $this->triagem->create($triagem);
    }
     public function delete($id)
    {
        $item =  $this->triagem->findOrFail($id);
        return $item->destroy($id);
    }
}
