@extends('layouts.app')

@section('content')
<div class="row justify-content-center">
    <div class="row col-lg-12 justify-content-around">
        <div>
            <h2></h2>
        </div>
        <div>
            <h2>Editar Entrenamiento</h2>
        </div>
        <div class="">
            <h2><a class="btn btn-primary" href="{{ route('entrenamientos.list')}}"> Volver</a></h2>
        </div>
    </div>
  </div>

@if ($errors->any())
    <div class="alert alert-danger">
        <strong>Ups!!</strong> Ha habido algun problema con la edición del entrenamiento.<br><br>
        <ul>
            @foreach ($errors->all() as $error)
            <li>{{ $error }}</li>
            @endforeach
        </ul>
    </div>
@endif

<div class="col-lg-12 p-2">
    <form action="{{ route('entrenamiento.update', $entrenamiento->id)}}" method="post" class="card p-2">
            @csrf
            @method('PUT')
          <div class="form-group">
              @csrf
              <label for="nombre">Tipo de entrenamiento:</label>
              <input type="text" class="form-control" name="tipo_entrenamiento" value="{{ $entrenamiento->tipo_entrenamiento }}"/>
          </div>
          <div class="form-group">
              <label for="descripcion">Descripcion del entrenamiento</label>
              <input type="text" class="form-control" name="descripcion" value="{{ $entrenamiento->descripcion }}"/>
          </div>
          
          <button type="submit" class="btn btn-primary">Editar Entrenamiento</button>
    </form>
</div>

@endsection