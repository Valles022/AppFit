@extends('layouts.app')

@section('content')
<div class="container-fluid">
    <div class="row justify-content-center">        
        <div class="col-md-11">
            <div class="row col-lg-12 justify-content-around">
                <div><h2></h2></div>
                <div><h2>Gestionar Clientes</h2></div>
                <div><h2></h2></div>
            </div>
            <div id="contenedor-clientes">
                <show-clientes></show-clientes>
            </div>
    </div>
</div>
@endsection
