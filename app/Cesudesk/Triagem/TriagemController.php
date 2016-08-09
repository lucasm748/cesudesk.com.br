<?php

namespace App\Cesudesk\Triagem;
use App\Http\Controllers\Controller;
use App\Cesudesk\Cargo\Cargo;
use App\Cesudesk\Equipe\Equipe;
use App\Cesudesk\Cargo\CargoService as CargoService;
use Illuminate\Http\Request;

use App\Cesudesk\Triagem\TriagemServiceContract;


class TriagemController extends Controller
{
    /**
    *Intancia de Triagem Service
    * @var App\Cesudesk\Triagem\TriagemService
    */
    protected $triagemService;
    /**
    * Instancia da Classe TriagemController
    *
    * @param App\Cesudesk\Triagem\TriagemServiceContract
    * @param TriagemServiceContract
    */
    public function __construct(TriagemServiceContract $triagemService)
    {
        $this->middleware('auth');
        $this->triagemService = $triagemService;
    }

    public function show($id)
    {
        $triagem = $this->triagemService->find($id);
        $usuariosTriagem = Usuario::where('active', 1)->select('login', 'id')->pluck('login', 'id');
        return view('triagens.show', compact('triagem'));
    }

    public function update(Request $request, $id)
    {
        $triagem = $this->triagemService->update($request->all(), $id);
        return redirect('tarefas');
    }

    public function destroy($id)
    {
        $triagem = $this->triagemService->delete($id);
        return 'deletado';
    }

    public function store(Request $request)
    {
        $triagem = $this->triagemService->store($request->all());
        return redirect('tarefas');
    }

}
