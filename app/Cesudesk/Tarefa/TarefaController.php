<?php

namespace App\Cesudesk\Tarefa;
use App\Http\Controllers\Controller;
use App\Cesudesk\Cargo\Cargo;
use App\Cesudesk\Equipe\Equipe;
use App\Cesudesk\Modulo\Modulo;
use App\Cesudesk\Projeto\Projeto;
use App\Cesudesk\TipoTarefa\TipoTarefa;
use App\Cesudesk\Usuario\Usuario;
use App\Cesudesk\Anexo\Anexo;
use App\Cesudesk\Cargo\CargoService as CargoService;
use Illuminate\Http\Request;
use \Carbon\Carbon;

use App\Cesudesk\Tarefa\TarefaServiceContract;


class TarefaController extends Controller
{
    /**
    *Intancia de Tarefa Service
    * @var App\Cesudesk\Tarefa\TarefaService
    */
    protected $tarefaService;
    /**
    * Instancia da Classe TarefaController
    *
    * @param App\Cesudesk\Tarefa\TarefaServiceContract
    * @param TarefaServiceContract
    */
    public function __construct(TarefaServiceContract $tarefaService)
    {
        $this->middleware('auth');
        $this->tarefaService = $tarefaService;
    }

    public function index()
    {
        $tarefas = $this->tarefaService->getAll();
        return view('tarefas.index', compact('tarefas'));
    }

    public function show($id)
    {
        $tarefa = $this->tarefaService->find($id);
        $triagens = array();
        $triagens = (array) $tarefa->triagens();
        print_r($triagens);exit;
        $tarefa->dh_cadastro = Carbon::now()->format('d/m/Y H:i:s');
        $modulos = Modulo::where('active', 1)->select('descricao','id')->pluck('descricao', 'id');
        $tipoTarefas = TipoTarefa::where('active', 1)->select('descricao','id')->pluck('descricao', 'id');
        $projetos = Projeto::where('active', 1)->select('descricao','id')->pluck('descricao', 'id');
        $usuarios = Usuario::where('active', 1)->select('login', 'id')->pluck('login', 'id');
        return view('tarefas.show',  compact('tarefa','modulos','tipoTarefas','projetos', 'usuarios', 'triagens'));
    }

    public function update(Request $request, $id)
    {
        $tarefa = $this->tarefaService->update($request->all(), $id);
        return redirect('tarefas');
    }

    public function destroy($id)
    {
        $tarefa = $this->tarefaService->delete($id);
        return redirect('tarefas');
    }

    public function create()
    {
        $tarefa = new Tarefa();
        $tarefa->dh_cadastro = Carbon::now()->format('d/m/Y H:i:s');
        $modulos = Modulo::where('active', 1)->select('descricao','id')->pluck('descricao', 'id');
        $tipoTarefas = TipoTarefa::where('active', 1)->select('descricao','id')->pluck('descricao', 'id');
        $projetos = Projeto::where('active', 1)->select('descricao','id')->pluck('descricao', 'id');
        $usuarios = Usuario::where('active', 1)->select('login', 'id')->pluck('login', 'id');
        $triagens = array();
        return view('tarefas.show',  compact('tarefa','modulos','tipoTarefas','projetos', 'usuarios', 'triagens'));
    }

    public function store(Request $request)
    {
        $tarefa = $this->tarefaService->store($request->all());
        // if count($triagens > 0 ){
        //     foreach ($triagens as $triagem) {
        //         $tarefa->triagens->save($triagem);
        //     }
        // }
        return redirect('tarefas');
    }

}
