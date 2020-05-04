@extends('layouts.app')

@section('content')
<div class="uper">
  @if(session()->get('success'))
    <div class="alert alert-success">
      {{ session()->get('success') }}  
    </div><br />
  @endif
  
  {{ $esCliente = Auth::user()->esCliente()}}
  <div id="contenedor-listado" class="row justify-content-center">
    <all-ejercicios :cliente="{{json_encode($esCliente)}}"></all-ejercicios>
<div>


@endsection