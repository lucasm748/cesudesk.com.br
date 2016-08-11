<?php

namespace App\Cesudesk\Anexo;
use App\Http\Controllers\Controller;
use App\Cesudesk\Cargo\Cargo;
use App\Cesudesk\Equipe\Equipe;
use App\Cesudesk\Cargo\CargoService as CargoService;
use Illuminate\Http\Request;
use Validator;

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

    public function destroy($id)
    {
        $anexo = $this->anexoService->delete($id);
        return redirect('anexos');
    }

    public function store(Request $request)
    {
        // $this->validade($request, 
        //     [
        //         'name' => 'required',
        //         'arquivo' => 'mimes:png,jpeg',
        //     ]);
        // $anexo = new Anexo($request->all());
        // $arquivo = $request->file('arquivo');

        // $ext = $arquivo->getClientOriginalExtension();
        // $path = public_path('uploads/anexos' .$arquivo->getClientOriginalName());
        // Request::file('arquivo')->move($path, $arquivo->getClientOriginalName());
        // // $anexo->arquivo = $path;
        // $anexo->save();

        // Session::flash('flash_message', 'Anexo enviado');
        // return redirect('tarefas');

    }

}
