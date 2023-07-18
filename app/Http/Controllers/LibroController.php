<?php

namespace App\Http\Controllers;

use App\Models\Libro;
use App\Models\Coleccion;
use App\Models\Estado;
use Illuminate\Http\Request;


class LibroController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $libro = Libro::latest()->paginate(5);
        return view('libro.index',compact('libro'))->with('i', (request()->input('page', 1) - 1) * 5);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $colecciones = Coleccion::all();
        $estados = Estado::all();
        return view('libro.create',['colecciones'=>$colecciones],['estados'=>$estados]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $request->validate([
            'titulo' => 'required',
            'descripcion' => 'required',
            'id_coleccion' => 'required',
            'id_estado' => 'required',
        ]);
  
        libro::create($request->all());
   
        return redirect()->route('libros.index')->with('success','libro created successfully.');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Libro  $libro
     * @return \Illuminate\Http\Response
     */
    public function show(Libro $libro)
    {
        return view('libro.show',compact('libro'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Libro  $libro
     * @return \Illuminate\Http\Response
     */
    public function edit(Libro $libro)
    {
        return view('libro.edit',compact('libro'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Libro  $libro
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Libro $libro)
    {
        //revisar aqui
        $request->validate([
            'titulo' => 'required',
            'descripcion' => 'required',
            'coleccion_id' => 'required',
            'estado_id' => 'required',
        ]);
  
        $libro->update($request->all());
  
        return redirect()->route('libros.index')->with('success','libro updated successfully');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Libro  $libro
     * @return \Illuminate\Http\Response
     */
    public function destroy(Libro $libro)
    {
        $libro->delete();
  
        return redirect()->route('libros.index')->with('success','libro deleted successfully');
    }
}