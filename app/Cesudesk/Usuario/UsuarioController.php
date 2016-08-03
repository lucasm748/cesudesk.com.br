<?php

namespace App\Cesudesk\Usuario;
use App\Http\Controllers\Controller;
use App\Cesudesk\Cargo\Cargo;
use App\Cesudesk\Equipe\Equipe;
use App\Cesudesk\Cargo\CargoService as CargoService;
use Illuminate\Http\Request;

use App\Cesudesk\Usuario\UsuarioServiceContract;


class UsuarioController extends Controller
{
    /**
    *Intancia de Usuario Service
    * @var App\Cesudesk\Usuario\UsuarioService
    */
    protected $usuarioService;
    /**
    * Instancia da Classe UsuarioController
    *
    * @param App\Cesudesk\Usuario\UsuarioServiceContract
    * @param UsuarioServiceContract
    */
    public function __construct(UsuarioServiceContract $usuarioService)
    {
        $this->middleware('auth');
        $this->usuarioService = $usuarioService;
    }

    public function index()
    {
        $usuarios = $this->usuarioService->getAll();
        return view('usuarios.index', compact('usuarios'));
    }

    public function show($id)
    {
        $usuario = $this->usuarioService->find($id);
        $cargos = Cargo::where('active', 1)->select('descricao','id')->pluck('descricao', 'id');
        $equipes = Equipe::where('active', 1)->select('descricao','id')->pluck('descricao', 'id');
        return view('usuarios.show', compact('usuario','cargos','equipes'));
    }

    public function update(Request $request, $id)
    {
        $usuario = $this->usuarioService->update($request->all(), $id);
        return redirect('usuarios');
    }

    public function destroy($id)
    {
        $usuario = $this->usuarioService->delete($id);
        return redirect('usuarios');
    }

    public function create()
    {
        $usuario = new Usuario();
        $cargos = Cargo::pluck('descricao', 'id');
        $equipes = Equipe::pluck('descricao', 'id');
        return view('usuarios.show', compact('usuario','cargos','equipes'));
    }

    public function store(Request $request)
    {
        $usuario = $this->usuarioService->store($request->all());
        return redirect('usuarios');
    }

}
