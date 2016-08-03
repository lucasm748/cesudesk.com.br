<?php

namespace App\Cesudesk\TipoTarefa;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

use App\Cesudesk\TipoTarefa\TipoTarefaServiceContract;

class TipoTarefaController extends Controller
{
    /**
    *Intancia de TipoTarefa Service
    * @var App\Cesudesk\TipoTarefa\TipoTarefaService
    */
    protected $tipoTarefaService;
    /**
    * Instancia da Classe TipoTarefaController
    *
    * @param App\Cesudesk\TipoTarefa\TipoTarefaServiceContract
    * @param TipoTarefaServiceContract
    */
    public function __construct(TipoTarefaServiceContract $tipoTarefaService)
    {
        $this->middleware('auth');
        $this->tipoTarefaService = $tipoTarefaService;
    }

    public function index()
    {
        $tipoTarefas = $this->tipoTarefaService->getAll();
        return view('tipoTarefas.index', compact('tipoTarefas'));
    }

    public function show($id)
    {
        $tipoTarefa = $this->tipoTarefaService->find($id);
        return view('tipoTarefas.show', compact('tipoTarefa'));
    }

    public function update(Request $request, $id)
    {
        $tipoTarefa = $this->tipoTarefaService->update($request->all(), $id);
        return redirect('tipoTarefas');
    }

    public function destroy($id)
    {
        $tipoTarefa = $this->tipoTarefaService->delete($id);
        return redirect('tipoTarefas');
    }

    public function create()
    {
        $tipoTarefa = new TipoTarefa();
        return view('tipoTarefas.show', compact('tipoTarefa'));
    }

    public function store(Request $request)
    {
        $tipoTarefa = $this->tipoTarefaService->store($request->all());
        return redirect('tipoTarefas');
    }
}
