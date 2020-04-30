@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">{{ __('Editar') }}</div>

                <div class="card-body">
                    <form method="POST" action="{{ route('usuarios.update', $user->id) }}" enctype="multipart/form-data">
                        @csrf
                        @method('PUT')
                        <div class="form-group row">
                            <label for="name" class="col-md-3 col-form-label text-md-right">{{ __('Nombre') }}</label>

                            <div class="col-md-8">
                                <input id="name" type="text" class="form-control @error('name') is-invalid @enderror" name="name" value="{{ $user->name }}" required autocomplete="name" autofocus>

                                @error('name')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="email" class="col-md-3 col-form-label text-md-right">{{ __('Dirección E-Mail') }}</label>

                            <div class="col-md-8">
                                <input id="email" type="email" class="form-control @error('email') is-invalid @enderror" name="email" value="{{ $user->email}}" required autocomplete="email">

                                @error('email')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>

                        @if(Auth::user()->esAdmin())
                        <div class="form-group row">
                            <label for="role" class="col-md-3 col-form-label text-md-right">{{ __('Role') }}</label>

                            <div class="col-md-8">
                            <select class="custom-select" id="role" name="role">
                            @if($user->esEntrenador())
                                <option selected value="2">Entrenador</option>
                                <option value="3">Cliente</option>
                            @else
                                <option value="2">Entrenador</option>
                                <option selected value="3">Cliente</option>
                            @endif
                            </select>
                            
                                @error('role')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>
                        @endif
                        <div class="form-group row">
                            <label for="objetivo" class="col-md-3 col-form-label text-md-right">{{ __('Objetivo') }}</label>

                            <div class="col-md-8">
                            <select class="custom-select" id="objetivo" name="objetivo">
                            @if($user->objetivo == 'Ganancia de masa muscular')
                                <option selected value="Ganancia de masa muscular">Ganancia de masa muscular</option>
                                <option value="Perdida de grasa">Perdida de grasa</option>
                                <option value="Aumento de resistencia">Aumento de resistencia</option>
                            @elseif($user->objetivo == 'Perdida de grasa')
                                <option value="Ganancia de masa muscular">Ganancia de masa muscular</option>
                                <option selected value="Perdida de grasa">Perdida de grasa</option>
                                <option value="Aumento de resistencia">Aumento de resistencia</option>
                            @else
                                <option value="Ganancia de masa muscular">Ganancia de masa muscular</option>
                                <option value="Perdida de grasa">Perdida de grasa</option>
                                <option selected value="Aumento de resistencia">Aumento de resistencia</option>
                            @endif
                            </select>

                                @error('objetivo')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="imagen" class="col-md-3 col-form-label text-md-right">{{ __('Imagen') }}</label>

                            <div class="col-md-8">
                                <input id="imagen" type="file" class="form-control @error('imagen') is-invalid @enderror" name="imagen">

                                @error('imagen')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>

                        <div class="form-group row mb-0">
                            <div class="col-md-6 offset-md-5">
                                <button type="submit" class="btn btn-primary">
                                    {{ __('Editar') }}
                                </button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection