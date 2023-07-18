@extends('libro.layout')
 
@section('content')
    <div class="row">
        <div class="col-lg-12 margin-tb">
            <div class="pull-left">
                <h2>How To Create CRUD Operation In Laravel 10 - Techsolutionstuff</h2>
            </div>
            <div class="pull-right">
                <a class="btn btn-success" href="{{ route('libros.create') }}"> Create New libro</a>
            </div>
        </div>
    </div>
   
    @if ($message = Session::get('success'))
        <div class="alert alert-success">
            <p>{{ $message }}</p>
        </div>
    @endif
   
    <table class="table table-bordered">
        <tr>
            <th>No</th>
            <th>ID</th>
            <th>Titulo</th>
            <th>Descripcion</th>
            <th>Coleccion</th>
            <th>Estado</th>
            <th width="280px">Action</th>
        </tr>
        @foreach ($libro as $libro)
        <tr>
            <td>{{ ++$i }}</td>
            <td>{{ $libro->id }}</td>
            <td>{{ $libro->titulo }}</td>
            <td>{{ $libro->descripcion }}</td>
            <td>{{ $libro->coleccion_id }}</td>
            <td>{{ $libro->estado_id }}</td>
            <td>
                <form action="{{ route('libros.destroy',$libro->id) }}" method="POST">
   
                    <a class="btn btn-info" href="{{ route('libros.show',$libro->id) }}">Show</a>
    
                    <a class="btn btn-primary" href="{{ route('libros.edit',$libro->id) }}">Edit</a>
   
                    @csrf
                    @method('DELETE')
      
                    <button type="submit" class="btn btn-danger">Delete</button>
                </form>
            </td>
        </tr>
        @endforeach
    </table>
  
    
      
@endsection