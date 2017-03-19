<?php namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Domain\SGFV\Entities\Sala;

class ReservasController extends Controller
{
    public function index()
    {
        return redirect()->route('reservas.consultar');
    }

    public function consultar(Request $request)
    {
        dd('consultar');
    }
}
