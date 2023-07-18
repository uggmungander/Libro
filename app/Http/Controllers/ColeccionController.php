<?php

namespace App\Http\Controllers;
use App\Models\Coleccion;
use Illuminate\Http\Request;

class ColeccionController extends Controller
{
     public function index()
    {
        $coleccion=roleUser::pluck('id_coleccion','nombre','descripcion');

    return view('auth.register',compact('coleccion') );
    }
}
