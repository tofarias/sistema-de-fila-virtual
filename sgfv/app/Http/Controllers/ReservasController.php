<?php namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Domain\SGFV\Entities\{ReservaSala as Reserva, User};

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
                // $builder = $builder->with(['sala' => function( $query ) use ($request){
                //     $query->whereRaw('lower(codigo) like ?', strtolower($request->codigo_sala) . '%');
                // }]);
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
}
