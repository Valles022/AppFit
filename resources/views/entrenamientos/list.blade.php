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
            <h2><a class="" href=""></a></h2>
        </div>
        <div>
            <h2>Listado de Entrenamientos</h2>
        </div>
        <div class="">
            <h2>@if(Auth::user()->role_id != 3)<a class="btn btn-primary" href="{{ route('entrenamientos.crear')}}"> Crear Entrenamiento</a>@endif</h2>
        </div>
    </div>
  </div>
  <div class="row justify-content-center">
    <div class="col-lg-11 text-center">
      <table class="table table-bordered">
        <thead>
            <tr>
              <td>ID</td>
              <td>Tipo Entrenamiento</td>
              <td>Descripcion</td>
              @if(Auth::user()->role_id != 3)
              <td>Action</td>
              @endif
            </tr>
        </thead>
        <tbody>
            @foreach($entrenamientos as $entrenamiento)
            <tr>
                <td>{{$entrenamiento->id}}</td>
                <td><a href="{{ route('entrenamientos.show', $entrenamiento->id)}}">{{$entrenamiento->tipo_entrenamiento}}</a></td>
                <td>{{$entrenamiento->descripcion}}</td>
                @if(Auth::user()->role_id != 3)
                <td>
                    <form action="{{ route('entrenamientos.destroy', $entrenamiento->id)}}" method="post">
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