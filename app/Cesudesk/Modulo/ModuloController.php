<?php

namespace App\Cesudesk\Modulo;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

use App\Cesudesk\Modulo\ModuloServiceContract;

class ModuloController extends Controller
{
    /**
    *Intancia de Modulo Service
    * @var App\Cesudesk\Modulo\ModuloService
    */
    protected $moduloService;
    /**
    * Instancia da Classe ModuloController
    *
    * @param App\Cesudesk\Modulo\ModuloServiceContract
    * @param ModuloServiceContract
    */
    public function __construct(ModuloServiceContract $moduloService)
    {
        $this->middleware('auth');
        $this->moduloService = $moduloService;
    }

    public function index()
    {
        $modulos = $this->moduloService->getAll();
        return view('modulos.index', compact('modulos'));
    }

    public function show($id)
    {
        $modulo = $this->moduloService->find($id);
        return view('modulos.show', compact('modulo'));
    }

    public function update(Request $request, $id)
    {
        $modulo = $this->moduloService->update($request->all(), $id);
        \Session::flash('status', 'Registro atualizado com sucesso.');
        \Session::flash('alert-class', 'alert-info');
        return redirect('modulos');
    }

    public function destroy($id)
    {
        $modulo = \DB::table('modulo')->where('modulo.id', '=', $id)
                      ->join('tarefa', 'tarefa.id_modulo', '=', 'modulo.id')
                      ->select('modulo.id')
                      ->get();
        if ($modulo) {
            \Session::flash('status', 'Impossível reomover o registro pois ele já possui vínculos.');
            \Session::flash('alert-class', 'alert-warning');
            $this->cargoService->getAll();
            return redirect('modulos');
        }

        \Session::flash('status', 'Registro removido com sucesso.');
        \Session::flash('alert-class', 'alert-danger');
        $this->cargoService->delete($id);

     return redirect('modulos');
    }

    public function create()
    {
        $modulo = new Modulo();
        return view('modulos.show', compact('modulo'));
    }

    public function store(Request $request)
    {
        $modulo = $this->moduloService->store($request->all());
        \Session::flash('status', 'Registro inserido com sucesso.');
        \Session::flash('alert-class', 'alert-success');
        return redirect('modulos');
    }
}
