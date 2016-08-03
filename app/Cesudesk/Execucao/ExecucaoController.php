<?php

namespace App\Cesudesk\Execucao;
use App\Http\Controllers\Controller;
use App\Cesudesk\Cargo\Cargo;
use App\Cesudesk\Equipe\Equipe;
use App\Cesudesk\Cargo\CargoService as CargoService;
use Illuminate\Http\Request;

use App\Cesudesk\Execucao\ExecucaoServiceContract;


class ExecucaoController extends Controller
{
    /**
    *Intancia de Execucao Service
    * @var App\Cesudesk\Execucao\ExecucaoService
    */
    protected $execucaoService;
    /**
    * Instancia da Classe ExecucaoController
    *
    * @param App\Cesudesk\Execucao\ExecucaoServiceContract
    * @param ExecucaoServiceContract
    */
    public function __construct(ExecucaoServiceContract $execucaoService)
    {
        $this->middleware('auth');
        $this->execucaoService = $execucaoService;
    }

    public function update(Request $request, $id)
    {
        $execucao = $this->execucaoService->update($request->all(), $id);
        return redirect('triagens');
    }

    public function destroy($id)
    {
        $execucao = $this->execucaoService->delete($id);
        return redirect('triagens');
    }

    public function create()
    {
        $execucao = new Execucao();
    }

    public function store(Request $request)
    {
        $execucao = $this->execucaoService->store($request->all());
        return redirect('triagens');
    }

}
