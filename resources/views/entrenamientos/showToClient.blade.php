@extends('layouts.app')

@section('content')
<div class="row justify-content-center">
    <div class="row col-lg-12 justify-content-around">
        <div>
            <h2>
                <a class="btn btn-primary" href="{{action('EntrenamientoController@downloadPDF', $entrenamiento->id)}}" >Descargar PDF</a>
            </h2>
        </div>
        <div>
            <h2>{{ $entrenamiento->tipo_entrenamiento }}</h2>
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
    <div class="row col-lg-12 justify-content-center">
        <h5>Descripcion: </h5>
        <p class="pl-2">{{ $entrenamiento->descripcion }}</p>
    </div>
    <div class="row col-lg-12 justify-content-center">
        <table class="table table-bordered text-center w-75">
        <thead>
            <tr>
                <td>Nombre del ejercicio</td>
                <td>Grupo Muscular principal</td>
                <td>Descripcion</td>
                <td>Imagen</td>
            </tr>
        </thead>
        <tbody>
            @foreach($ejercicios as $ejercicio)
            <tr>
                <td>{{$ejercicio->nombre}}</td>
                <td>{{$ejercicio->musculo}}</td>
                <td>{{$ejercicio->descripcion}}</td>
                <td><img src="../images/ejercicios/{{$ejercicio->imagen}}" alt="Imagen de {{$ejercicio->nombre}}" width="200"/></td>
            </tr>
            @endforeach
        </tbody>
        </table>
    </div>
</div>


@endsection