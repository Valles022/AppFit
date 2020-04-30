@extends('layouts.app')

@section('content')
<div class="container-fluid">
    <div class="row justify-content-center">        
        <div class="col-lg-11 text-center">
            <div class="row col-lg-12 justify-content-around">
                <div><h2></h2></div>
                <div><h2>Gestionar Usuarios</h2></div>
                <div><h2><a class="btn btn-info" href="{{ route('register') }}"> Crear Usuario</a></h2></div>
            </div>
            <table class="table table-bordered">
                <thead>
                    <tr>
                        <td>ID</td>
                        <td>Imagen</td>
                        <td>Nombre</td>
                        <td>Email</td>
                        <td>Objetivo</td>
                        <td colspan="2">Acción</td>
                    </tr>
                </thead>
                <tbody>
                    @foreach($usuarios as $usuario)
                    @if(!$usuario->esAdmin())
                    <tr>
                        <td>{{$usuario->id}}</td>
                        @if($usuario->imagen)
                        <td><img src="./images/usuarios/{{$usuario->imagen}}" style="width: 100px;" alt="Imagen de {{$usuario->name}}"/></td>
                        @else
                        <td><img src="./images/usuarios/default.jpg" style="width: 100px;" alt="Imagen de {{$usuario->name}}"/></td>
                        @endif
                        <td>{{$usuario->name}}</td>
                        <td>{{$usuario->email}}</td>
                        <td>{{$usuario->objetivo}}</td>
                        <td><a href="{{ route('usuarios.editar', $usuario->id)}}" class="btn btn-primary">Edit</a></td>
                        
                        <td>
                            <form action="{{ route('usuarios.delete', $usuario->id)}}" method="post">
                                @csrf
                                @method('DELETE')
                                <button class="btn btn-danger" type="submit">Delete</button>
                            </form>
                        </td>
                    </tr>
                    @endif
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>
</div>
@endsection
