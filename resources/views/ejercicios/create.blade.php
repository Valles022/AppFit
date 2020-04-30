@extends('layouts.app')

@section('content')
<div class="row justify-content-center">
    <div class="row col-lg-12 justify-content-around">
        <div>
            <h2></h2>
        </div>
        <div>
            <h2>Crear Ejercicio</h2>
        </div>
        <div class="">
            <h2><a class="btn btn-primary" href="{{ route('ejercicios.list')}}"> Volver</a></h2>
        </div>
    </div>
  </div>

@if ($errors->any())
    <div class="alert alert-danger">
        <strong>Ups!!</strong> Ha habido algun problema con la creación del ejercicio.<br><br>
        <ul>
            @foreach ($errors->all() as $error)
            <li>{{ $error }}</li>
            @endforeach
        </ul>
    </div>
@endif

<div class="row justify-content-center">
    <div class="col-lg-11">
        <form method="post" action="{{ route('ejercicios.store') }}" class="card p-2" enctype="multipart/form-data">
            <div class="form-group">
                @csrf
                <label for="nombre">Nombre del ejercicio:</label>
                <input type="text" class="form-control" name="nombre"/>
            </div>
            <div class="form-group">
                <label for="musculo">Grupo muscular principal involucrado</label>
                <input type="text" class="form-control" name="musculo"/>
            </div>
            <div class="form-group">
                <label for="descripcion">Descripcion del ejercicio</label>
                <input type="text" class="form-control" name="descripcion"/>
            </div>
            <div class="form-group">
                <label for="imagen">Imagen del ejercicio</label>
                <input type="file" class="form-control" name="imagen"/>
            </div>
            
            <button type="submit" class="btn btn-primary">Create Ejercicio</button>
        </form>
    </div>
</div>

@endsection