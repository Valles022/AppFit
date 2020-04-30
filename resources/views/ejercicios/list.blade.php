@extends('layouts.app')

@section('content')
<div class="uper">
  @if(session()->get('success'))
    <div class="alert alert-success">
      {{ session()->get('success') }}  
    </div><br />
  @endif
  <div class="row justify-content-center">
    <div class="row col-lg-12 justify-content-around">
        <div>
            <h2></h2>
        </div>
        <div>
            <h2>Listado de Ejercicios</h2>
        </div>
        <div class="">
            <h2><a class="btn btn-primary" href="{{ route('ejercicios.crear')}}"> Crear Ejercicio</a></h2>
        </div>
    </div>
  </div>

  <div class="row justify-content-center">
    <div class="col-lg-11 text-center">
      <table class="table table-bordered">
        <thead>
            <tr>
              <td>ID</td>
              <td>Nombre del ejercicio</td>
              <td>Grupo Muscular principal</td>
              <td>Descripcion</td>
              <td>Imagen</td>
              @if(!Auth::user()->esCliente())
              <td colspan="2">Action</td>
              @endif
            </tr>
        </thead>
        <tbody>
            @foreach($ejercicios as $ejercicio)
            <tr>
                <td>{{$ejercicio->id}}</td>
                <td>{{$ejercicio->nombre}}</td>
                <td>{{$ejercicio->musculo}}</td>
                <td>{{$ejercicio->descripcion}}</td>
                <td><img src="./images/ejercicios/{{$ejercicio->imagen}}" alt="Imagen de {{$ejercicio->nombre}}" width="200" /></td>
                @if(!Auth::user()->esCliente())
                <td><a href="{{ route('ejercicios.editar', $ejercicio->id)}}" class="btn btn-primary">Edit</a></td>
                <td>
                    <form action="{{ route('ejercicios.destroy', $ejercicio->id)}}" method="post">
                      @csrf
                      @method('DELETE')
                      <button class="btn btn-danger" type="submit">Delete</button>
                    </form>
                </td>
                @endif
            </tr>
            @endforeach
        </tbody>
      </table>
    </div>
  </div>
<div>


@endsection