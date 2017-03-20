<?php namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Domain\SGFV\Entities\{ReservaSala as Reserva, User, Sala};

class ReservasController extends Controller
{
    public function index()
    {
        return redirect()->route('reservas.consultar');
    }

    public function consultar(Request $request)
    {
        $reservas = [];

        if( $request->isMethod('get') )
        {
            $builder = Reserva::with(['createdBy', 'updatedBy', 'sala']);

            if ($request->has('codigo_reserva'))
            {
                $builder = $builder->whereRaw('lower(codigo) like ?', strtolower($request->codigo_reserva) . '%');
            }

            if ($request->has('codigo_sala'))
            {
                $builder = $builder->join('salas', 'salas.sala_id', '=', 'reserva_salas.sala_id')
                                    ->whereRaw('lower(salas.codigo) like ?', strtolower($request->codigo_sala) . '%');
            }

            if ($request->has('user_id'))
            {
                $builder = $builder->join('users', 'users.id', '=', 'reserva_salas.created_by')
                                    ->where('users.id', $request->user_id);
            }

            $reservas = $builder->orderBy('reserva_salas.created_at','desc')->paginate(10);
        }

        //

        $usuarios = User::orderBy('name')->pluck('name', 'id')->toArray();

        return view('reservas.consultar', compact('reservas', 'usuarios'));
    }

    public function viewCadastrar()
    {
        $salas = Sala::orderBy('nome')->pluck('nome', 'sala_id')->toArray();

        return view('reservas.cadastrar', compact('salas'));
    }

    public function cadastrar(Request $request)
    {
        $reserva = new Reserva;

        if( $request->has('codigo') )
        {
            $reserva->codigo = $request->codigo;
        }

        if( $request->has('dt_inicio') )
        {
            if( $request->has('hr_inicio') )
            {   
                $d = new \DateTime( $request->dt_inicio.$request->hr_inicio );
                $reserva->dt_inicio = $d->format('Y-m-d H:i:s');

                $d->add(new \DateInterval('PT1H'));
                $reserva->dt_fim = $d->format('Y-m-d H:i:s');
            }
        }

        if( $request->has('sala_id') )
        {
            $reserva->sala_id = $request->sala_id;
        }

        if( $request->has('observacao') )
        {
            $reserva->observacao = $request->observacao;
        }

        //

        try
        {
            $reserva->save();

            return redirect()->route('reservas.consultar',['codigo' => $request->codigo]);    
        }
        catch( \DomainException $e )
        {
            return redirect()->route('reservas.consultar')->with('fail', $e->getMessage());
        }
    }    
}