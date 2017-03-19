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
            $builder = Sala::with(['createdBy']);

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

        return view('salas.consulta', compact('salas'));
    }
}
