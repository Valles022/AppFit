@extends('layouts.app')

@section('content')
<div class="row justify-content-center">
    <div class="row col-lg-12 justify-content-around">
        <div>
            <h2></h2>
        </div>
        <div>
            <h2>Editar Ejercicio</h2>
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
        <form action="{{ route('ejercicios.update', $ejercicio->id)}}" method="post" class="card p-2" enctype="multipart/form-data">
                @csrf
                @method('PUT')
            <div class="form-group">
                @csrf
                <label for="nombre">Nombre del ejercicio:</label>
                <input type="text" class="form-control" name="nombre" value="{{ $ejercicio->nombre }}"/>
            </div>
            <div class="form-group">
                <label for="musculo">Grupo muscular principal involucrado</label>
                <input type="text" class="form-control" name="musculo" value="{{ $ejercicio->musculo }}"/>
            </div>
            <div class="form-group">
                <label for="descripcion">Descripcion del ejercicio</label>
                <input type="text" class="form-control" name="descripcion" value="{{ $ejercicio->descripcion }}"/>
            </div>
            <div class="form-group">
                <label for="imagen">Imagen del ejercicio</label>
                <img src="../images/ejercicios/{{$ejercicio->imagen}}" alt="Imagen de {{$ejercicio->nombre}}" />
                <input type="file" class="form-control" name="imagen" value="{{ $ejercicio->imagen }}"/>
            </div>
            
            <button type="submit" class="btn btn-primary">Editar Ejercicio</button>
        </form>
    </div>
</div>

@endsection