@extends('layouts.app')

@section('content')
<div class="container-fluid">
    <div class="row justify-content-center">        
        <div class="col-md-11">
            <div class="row col-lg-12 justify-content-around">
                <div>
                @if($entrenamiento != null)
                    <h2><a class="btn btn-primary" href="{{action('EntrenamientoController@downloadPDF', $entrenamiento->id)}}" >Descargar PDF</a></h2>
                @endif
                </div>
                <div><h2>Mi rutina</h2></div>
                <div><h2></h2></div>
            </div>
            @if($ejercicios != null)
            <table class="table table-bordered text-center">
                <thead>
                    <tr>
                        <td>NOMBRE</td>
                        <td>MÚSCULO</td>
                        <td>DESCRIPCIÓN</td>
                        <td>IMAGEN</td>
                    </tr>
                </thead>
                <tbody>
                    @foreach($ejercicios as $ejercicio)
                    <tr>
                        <td>{{$ejercicio->nombre}}</td>
                        <td>{{$ejercicio->musculo}}</td>
                        <td>{{$ejercicio->descripcion}}</td>
                        <td><img src="./images/ejercicios/{{$ejercicio->imagen}}" alt="Imagen de {{$ejercicio->nombre}}" width="200"/></td>
                    </tr>
                    @endforeach
                </tbody>
            </table>
            @endif
        </div>
    </div>
</div>
@endsection
