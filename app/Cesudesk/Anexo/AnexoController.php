<?php

namespace App\Cesudesk\Anexo;
use App\Http\Controllers\Controller;
use App\Cesudesk\Cargo\Cargo;
use App\Cesudesk\Equipe\Equipe;
use App\Cesudesk\Cargo\CargoService as CargoService;
use Illuminate\Http\Request;

use App\Cesudesk\Anexo\AnexoServiceContract;


class AnexoController extends Controller
{
    /**
    *Intancia de Anexo Service
    * @var App\Cesudesk\Anexo\AnexoService
    */
    protected $anexoService;
    /**
    * Instancia da Classe AnexoController
    *
    * @param App\Cesudesk\Anexo\AnexoServiceContract
    * @param AnexoServiceContract
    */
    public function __construct(AnexoServiceContract $anexoService)
    {
        $this->middleware('auth');
        $this->anexoService = $anexoService;
    }

    public function index()
    {
        $anexos = $this->anexoService->getAll();
        return view('anexos.index', compact('anexos'));
    }

    public function show($id)
    {
        $anexo = $this->anexoService->find($id);
        return view('anexos.show', compact('anexo'));
    }

    public function update(Request $request, $id)
    {
        $anexo = $this->anexoService->update($request->all(), $id);
        return redirect('anexos');
    }

    public function destroy($id)
    {
        $anexo = $this->anexoService->delete($id);
        return redirect('anexos');
    }

    public function create()
    {
        $anexo = new Anexo();
        return view('anexos.show',  compact('anexo'));
    }

    public function store(Request $request)
    {
        $anexo = $this->anexoService->store($request->all());
        return redirect('anexos');
    }

}
