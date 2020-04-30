@extends('layouts.app')

@section('content')
<div class="row justify-content-center">
    <div class="row col-lg-12 justify-content-around">
        <div>
            <h2>
                @auth
                <a class="" href="" id=""></a>
                @endauth
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

<div class="row col-lg-12 p-2 justify-content-center">
    <div class="row col-lg-12 justify-content-center">
        <h5>Descripcion: </h5>
        <p class="pl-2">{{ $entrenamiento->descripcion }}</p>
    </div>
    
    <div id="contenedorEjercicios" class="row col-lg-11"> 
        <show-list-ejercicios  :entrenamiento="{{json_encode($entrenamiento)}}" :ejercicios="{{json_encode($ejercicios)}}" class="col-lg-12"></show-list-ejercicios>
    </div>
</div>
@endsection
