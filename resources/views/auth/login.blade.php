@extends('layouts.app')

@section('content')
<div class="container-fluid">
    <div class="row  justify-content-center">
        <div class="col-md-6">
            <div class="card h-100">
                <div class="card-header text-center">{{ __('Login') }}</div>

                <div class="card-body">
                    <div class="row justify-content-center">
                        <img src="/images/background/Logo.jpg" style="width:450px; height: 260px" alt="Logo de la empresa"/>
                    </div>
                    <form method="POST" action="{{ route('login') }}">
                        @csrf

                        <div class="form-group row">
                            <label for="email" class="col-md-4 col-form-label text-md-right">{{ __('E-Mail Address') }}</label>

                            <div class="col-md-6">
                                <input id="email" type="email" class="form-control @error('email') is-invalid @enderror" name="email" value="{{ old('email') }}" required autocomplete="email" autofocus>

                                @error('email')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="password" class="col-md-4 col-form-label text-md-right">{{ __('Password') }}</label>

                            <div class="col-md-6">
                                <input id="password" type="password" class="form-control @error('password') is-invalid @enderror" name="password" required autocomplete="current-password">

                                @error('password')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>

                        <div class="form-group row">
                            <div class="col-md-6 offset-md-4">
                                <div class="form-check">
                                    <input class="form-check-input" type="checkbox" name="remember" id="remember" {{ old('remember') ? 'checked' : '' }}>

                                    <label class="form-check-label" for="remember">
                                        {{ __('Remember Me') }}
                                    </label>
                                </div>
                            </div>
                        </div>

                        <div class="form-group row mb-0">
                            <div class="col-md-8 offset-md-4">
                                <button type="submit" class="btn btn-primary">
                                    {{ __('Login') }}
                                </button>

                                @if (Route::has('password.request'))
                                    <a class="btn btn-link" href="{{ route('password.request') }}">
                                        {{ __('Forgot Your Password?') }}
                                    </a>
                                @endif
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
        {{-- <div class="col-lg-8">
            <div id="carouselExampleIndicators" class="carousel slide w-100" data-ride="carousel">
                <ol class="carousel-indicators">
                    <li data-target="#carouselExampleIndicators" data-slide-to="0" class="active"></li>
                    <li data-target="#carouselExampleIndicators" data-slide-to="1"></li>
                    <li data-target="#carouselExampleIndicators" data-slide-to="2"></li>
                </ol>
                <div class="carousel-inner">
                    <div class="carousel-item active">
                        <img class="d-block w-100" style="height: 88vh;" src="./images/background/bckgnd1.jpg" alt="First slide">
                        <div class="carousel-caption d-none d-md-block">
                            <h5>Entrena en silencio, haz que tus logros hablen por ti</h5>
                            <p>Con nuestros metodos, obtendras  los mejores resultados</p>
                        </div>
                    </div>
                    <div class="carousel-item">
                        <img class="d-block w-100" style="height: 88vh;" src="./images/background/bckgnd2.jpg" alt="Second slide">
                        <div class="carousel-caption d-none d-md-block">
                            <h5>Llega donde antes nunca habias soñado llegar</h5>
                            <p>Junto a nuestros entrenadores expertos en entrenamiento en cada ambito deportivo</p>
                        </div>
                    </div>
                    <div class="carousel-item">
                        <img class="d-block w-100" style="height: 88vh;" src="./images/background/bckgnd3.jpg" alt="Third slide">
                        <div class="carousel-caption d-none d-md-block">
                            <h5>Supera tus limites!!</h5>
                            <p>Diferentes planes de entrenamiento para sacar tu máximo potencial</p>
                        </div>
                    </div>
                </div>
                
            </div>
        </div>  --}}
    </div>
</div>
@endsection
