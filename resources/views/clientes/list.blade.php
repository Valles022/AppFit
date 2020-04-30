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
            <h2>Listado de Clientes</h2>
        </div>
        <div class="">
            <h2><a class="btn btn-primary" href=""></a></h2>
        </div>
    </div>
  </div>
  <div class="col-lg-12 text-center">
    <table class="table table-bordered">
      <thead>
          <tr>
            <td>ID</td>
            <td>Nombre</td>
            <td>Email</td>
          </tr>
      </thead>
      <tbody>
          @foreach($clientes as $cliente)
          <tr>
              <td>{{$cliente->id}}</td>
              <td>{{$cliente->name}}</td>
              <td>{{$cliente->email}}</td>
          </tr>
          @endforeach
      </tbody>
    </table>
  </div>
<div>


@endsection