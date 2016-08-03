<?php

namespace App\Cesudesk\Projeto;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

use App\Cesudesk\Projeto\ProjetoServiceContract;

class ProjetoController extends Controller
{
    /**
    *Intancia de Projeto Service
    * @var App\Cesudesk\Projeto\ProjetoService
    */
    protected $projetoService;
    /**
    * Instancia da Classe ProjetoController
    *
    * @param App\Cesudesk\Projeto\ProjetoServiceContract
    * @param ProjetoServiceContract
    */
    public function __construct(ProjetoServiceContract $projetoService)
    {
        $this->middleware('auth');
        $this->projetoService = $projetoService;
    }

    public function index()
    {
        $projetos = $this->projetoService->getAll();
        return view('projetos.index', compact('projetos'));
    }

    public function show($id)
    {
        $projeto = $this->projetoService->find($id);
        return view('projetos.show', compact('projeto'));
    }

    public function update(Request $request, $id)
    {
        $projeto = $this->projetoService->update($request->all(), $id);
        \Session::flash('status', 'Registro atualizado com sucesso.');
        \Session::flash('alert-class', 'alert-info');
        return redirect('projetos');
    }

    public function destroy($id)
    {
        $projeto = \DB::table('projeto')->where('projeto.id', '=', $id)
                      ->join('tarefa', 'tarefa.id_projeto', '=', 'projeto.id')
                      ->select('projeto.id')
                      ->get();
        if ($projeto) {
            \Session::flash('status', 'Impossível reomover o registro pois ele já possui vínculos.');
            \Session::flash('alert-class', 'alert-warning');
            $this->cargoService->getAll();
            return redirect('projetos');
        }

        \Session::flash('status', 'Registro removido com sucesso.');
        \Session::flash('alert-class', 'alert-danger');
        $this->cargoService->delete($id);

     return redirect('projetos');
    }

    public function create()
    {
        $projeto = new Projeto();
        return view('projetos.show', compact('projeto'));
    }

    public function store(Request $request)
    {
        $projeto = $this->projetoService->store($request->all());
        \Session::flash('status', 'Registro inserido com sucesso.');
        \Session::flash('alert-class', 'alert-success');
        return redirect('projetos');
    }
}
