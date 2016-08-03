<?php

namespace App\Cesudesk\Projeto;
use App\Cesudesk\Projeto\Projeto;
use App\Cesudesk\Projeto\ProjetoRepositoryContract;

class ProjetoRepository implements ProjetoRepositoryContract
{
    /**
    *
    * @var App\Cesudesk\Projeto\Projeto
    */
    protected $projeto;
    /**
    * Instancia da Classe ProjetoRepositoryContract
    *
    * @param App\Cesudesk\Projeto\Projeto
    * @param Projeto
    */
    public function __construct(Projeto $projeto)
    {
        $this->projeto = $projeto;
    }

    public function getAll()
    {
       return $this->projeto->all();
    }

    public function find($id)
    {
        return $this->projeto->findOrFail($id);
    }

    public function save($projeto)
    {

    }

    public function update($projeto, $id)
    {
        $data = $this->projeto->findOrFail($id);
        $data['active'] = (\Request::has('active')) ? true : false;
        return $data->update($projeto);
    }
    public function store($projeto)
    {
      return $this->projeto->create($projeto);
    }
     public function delete($id)
    {
        $item =  $this->projeto->findOrFail($id);
        return $item->destroy($id);
    }
}
