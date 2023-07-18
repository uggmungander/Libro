@extends('libro.layout')
  
@section('content')
<div class="row">
    <div class="col-lg-12 margin-tb">
        <div class="pull-left">
            <h2>Add New libro</h2>
        </div>
        <div class="pull-right">
            <a class="btn btn-primary" href="{{ route('libros.index') }}"> Back</a>
        </div>
    </div>
</div>
   
@if ($errors->any())
    <div class="alert alert-danger">
        <strong>Error!</strong> <br>
        <ul>
            @foreach ($errors->all() as $error)
                <li>{{ $error }}</li>
            @endforeach
        </ul>
    </div>
@endif
   
<form action="{{ route('libros.store') }}" method="POST">
    @csrf
  
     <div class="row">
        <div class="col-xs-12 col-sm-12 col-md-12">
            <div class="form-group">
                <strong>Titulo:</strong>
                <input type="text" name="titulo" class="form-control" placeholder="titulo">
            </div>
        </div>
        <div class="col-xs-12 col-sm-12 col-md-12">
            <div class="form-group">
                <strong>Descripcion:</strong>
                <textarea class="form-control" style="height:150px" name="descripcion" placeholder="descripcion"></textarea>
            </div>
        </div>
        <div class="col-xs-12 col-sm-12 col-md-12">
            <div class="form-group">
            <select id="id_coleccion" name="id_coleccion" class="form-control" placeholder="id_coleccion">
            <option>------Seleccionar Coleccion------</option>
            @foreach($colecciones as $coleccion)
                <option value="{{ $coleccion['id_coleccion'] }}">{{ $coleccion['nombre'] }}</option>
            @endforeach
</select>
            </div>
        </div>
        <div class="col-xs-12 col-sm-12 col-md-12">
            <div class="form-group">
            <select id="id_estado" name="id_estado" class="form-control" placeholder="id_estado">
            <option>------Seleccionar Estado------</option>
            @foreach($estados as $estado)
                <option value="{{ $estado['id_estado'] }}">{{ $estado['nombre'] }}</option>
            @endforeach
            </select>
        </div>
        <div class="col-xs-12 col-sm-12 col-md-12 text-center">
                <button type="submit" class="btn btn-primary">Submit</button>
        </div>
    </div>
   
</form>
@endsection