<?php

namespace App\Cesudesk\Cargo;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;


use App\Cesudesk\Cargo\CargoServiceContract;

class CargoController extends Controller
{
    /**
    *Intancia de Cargo Service
    * @var App\Cesudesk\Cargo\CargoService
    */
    protected $cargoService;
    /**
    * Instancia da Classe CargoController
    *
    * @param App\Cesudesk\Cargo\CargoServiceContract
    * @param CargoServiceContract
    */
    public function __construct(CargoServiceContract $cargoService)
    {
        $this->middleware('auth');
        $this->cargoService = $cargoService;

    }

    public function index()
    {
        $cargos = $this->cargoService->getAll();
        return view('cargos.index', compact('cargos'));
    }

    public function show($id)
    {
        $cargo = $this->cargoService->find($id);
        return view('cargos.show', compact('cargo'));
    }

    public function update(Request $request, $id)
    {
        $cargo = $this->cargoService->update($request->all(), $id);
        \Session::flash('status', 'Registro atualizado com sucesso.');
        \Session::flash('alert-class', 'alert-info');
        return redirect('cargos');
    }

    public function destroy($id)
    {
        $cargo = \DB::table('cargo')->where('cargo.id', '=', $id)
                      ->join('usuario', 'usuario.id_cargo', '=', 'cargo.id')
                      ->select('cargo.id')
                      ->get();
        if ($cargo) {
            \Session::flash('status', 'Impossível reomover o registro pois ele já possui vínculos.');
            \Session::flash('alert-class', 'alert-warning');
            $this->cargoService->getAll();
            return redirect('cargos');
        }

        \Session::flash('status', 'Registro removido com sucesso.');
        \Session::flash('alert-class', 'alert-danger');
        $this->cargoService->delete($id);

     return redirect('cargos');

    }

    public function create()
    {
        $cargo = new Cargo();
        return view('cargos.show', compact('cargo'));
    }

    public function store(Request $request)
    {
        $cargo = $this->cargoService->store($request->all());
        \Session::flash('status', 'Registro inserido com sucesso.');
        \Session::flash('alert-class', 'alert-success');
        return redirect('cargos');
    }
}
