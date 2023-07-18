<?php

namespace App\Http\Controllers;
use App\Models\Estado;
use Illuminate\Http\Request;

class EstadoController extends Controller
{
     public function index()
    {
        $coleccion=roleUser::pluck('id_estado','nombre','descripcion');

    return view('auth.register',compact('estado') );
    }
}