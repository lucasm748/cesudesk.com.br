<?php

namespace App\Cesudesk\Anexo;
use App\Cesudesk\Anexo\Anexo;
use App\Cesudesk\Anexo\AnexoRepositoryContract;

class AnexoRepository implements AnexoRepositoryContract
{
    /**
    *
    * @var App\Cesudesk\Anexo\Anexo
    */
    protected $anexo;
    /**
    * Instancia da Classe AnexoRepositoryContract
    *
    * @param App\Cesudesk\Anexo\Anexo
    * @param Anexo
    */
    public function __construct(Anexo $anexo)
    {
        $this->anexo = $anexo;
    }

    public function getAll()
    {
       return $this->anexo->all();
    }

    public function find($id)
    {
        return $this->anexo->findOrFail($id);
    }

    public function save($anexo)
    {
        return 'metodo save não implementado';
    }

    public function update($anexo, $id)
    {
        $data = $this->anexo->findOrFail($id);
        return $data->update($anexo);
    }
    public function store($anexo)
    {
      return $this->anexo->create($anexo);
    }
     public function delete($id)
    {
        $item =  $this->anexo->findOrFail($id);
        return $item->destroy($id);
    }
}
