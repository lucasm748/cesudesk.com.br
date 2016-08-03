<?php

namespace App\Cesudesk\Equipe;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;


use App\Cesudesk\Equipe\EquipeServiceContract;

class EquipeController extends Controller
{
    /**
    *Intancia de Equipe Service
    * @var App\Cesudesk\Equipe\EquipeService
    */
    protected $equipeService;
    /**
    * Instancia da Classe EquipeController
    *
    * @param App\Cesudesk\Equipe\EquipeServiceContract
    * @param EquipeServiceContract
    */
    public function __construct(EquipeServiceContract $equipeService)
    {
        $this->middleware('auth');
        $this->equipeService = $equipeService;

    }

    public function index()
    {
        $equipes = $this->equipeService->getAll();
        return view('equipes.index', compact('equipes'));
    }

    public function show($id)
    {
        $equipe = $this->equipeService->find($id);
        return view('equipes.show', compact('equipe'));
    }

    public function update(Request $request, $id)
    {
        $equipe = $this->equipeService->update($request->all(), $id);
        \Session::flash('status', 'Registro atualizado com sucesso.');
        \Session::flash('alert-class', 'alert-info');
        return redirect('equipes');
    }

    public function destroy($id)
    {
        $equipe = \DB::table('equipe')->where('equipe.id', '=', $id)
                      ->join('usuario', 'usuario.id_equipe', '=', 'equipe.id')
                      ->select('equipe.id')
                      ->get();
        if ($equipe) {
            \Session::flash('status', 'Impossível reomover o registro pois ele já possui vínculos.');
            \Session::flash('alert-class', 'alert-warning');
            $this->equipeService->getAll();
            return redirect('equipes');
        }

        \Session::flash('status', 'Registro removido com sucesso.');
        \Session::flash('alert-class', 'alert-danger');
        $this->equipeService->delete($id);

     return redirect('equipes');

    }

    public function create()
    {
        $equipe = new Equipe();
        return view('equipes.show', compact('equipe'));
    }

    public function store(Request $request)
    {
        $equipe = $this->equipeService->store($request->all());
        \Session::flash('status', 'Registro inserido com sucesso.');
        \Session::flash('alert-class', 'alert-success');
        return redirect('equipes');
    }
}
