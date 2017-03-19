<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class SalasController extends Controller
{
    public function index()
    {
        return redirect()->route('salas.consultar');
    }

    public function consultar()
    {
        dd('consultar');
    }
}
