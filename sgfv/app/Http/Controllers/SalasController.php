<?php namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Domain\SGFV\Entities\Sala;

class SalasController extends Controller
{
    public function index()
    {
        return redirect()->route('salas.consultar');
    }

    public function consultar(Request $request)
    {
        $salas = [];

        if( $request->isMethod('get') )
        {
            $builder = Sala::with(['createdBy', 'updatedBy']);

            if ($request->has('codigo'))
            {
                $builder = $builder->whereRaw('lower(codigo) like ?', strtolower($request->codigo) . '%');
            }

            if ($request->has('nome'))
            {
                $builder = $builder->whereRaw('lower(nome) like ?', strtolower($request->nome) . '%');
            }

            if ($request->has('localizacao'))
            {
                $builder = $builder->whereRaw('lower(localizacao) like ?', strtolower($request->localizacao) . '%');
            }

            $salas = $builder->orderBy('created_at','desc')->paginate(10);
        }

        return view('salas.consultar', compact('salas'));
    }

    public function viewEditar(Request $request, Sala $sala)
    {
        return view('salas.editar', compact('sala'));
    }

    public function editar(Request $request, Sala $sala)
    {
        if( $request->has('codigo') )
        {
            $sala->codigo = $request->codigo;
        }

        if( $request->has('nome') )
        {
            $sala->nome = $request->nome;
        }

        if( $request->has('localizacao') )
        {
            $sala->localizacao = $request->localizacao;
        }

        $sala->saveOrFail();

        return redirect()->route('salas.consultar',['codigo' => $request->codigo]);
    }

    public function excluir(Sala $sala)
    {
        $sala->delete();

        return redirect()->route('salas.consultar');
    }

    public function viewCadastrar()
    {
        return view('salas.cadastrar');
    }

    public function cadastrar(Request $request)
    {
        $sala = new Sala;

        if( $request->has('codigo') )
        {
            $sala->codigo = $request->codigo;
        }

        if( $request->has('nome') )
        {
            $sala->nome = $request->nome;
        }

        if( $request->has('localizacao') )
        {
            $sala->localizacao = $request->localizacao;
        }
        
        $sala->saveOrFail();

        return redirect()->route('salas.consultar',['codigo' => $request->codigo]);
    }
}
