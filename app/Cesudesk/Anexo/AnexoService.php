<?php

namespace App\Cesudesk\Anexo;
use App\Cesudesk\Anexo\AnexoServiceContract;
use App\Cesudesk\Anexo\AnexoRepositoryContract;

class AnexoService implements AnexoServiceContract
{
    /**
    *Intancia de ALuno Repository
    * @var App\Cesudesk\Anexo\AnexoRepositoryContract
    */
    protected $anexoRepository;
    /**
    * Instancia da Classe AnexoRepositoryContract
    *
    * @param App\Cesudesk\Anexo\AnexoRepositoryContract
    * @param AnexoRepositoryContract
    */
    public function __construct(AnexoRepositoryContract $anexoRepository)
    {
        $this->anexoRepository = $anexoRepository;
    }

    public function getAll()
    {
       return $this->anexoRepository->getAll();
    }
    public function find($id)
    {
        return $this->anexoRepository->find($id);
    }
    public function save($anexo)
    {

    }
    public function update($anexo, $id)
    {
        return $this->anexoRepository->update($anexo, $id);
    }
    public function store($anexo)
    {
        return $this->anexoRepository->store($anexo);
    }
    public function delete($id)
    {
        return $this->anexoRepository->delete($id);
    }
}
