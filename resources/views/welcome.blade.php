@extends('layouts.app')

@section('content')
<div class="container-fluid">
    <div class="row col-lg-12 justify-content-center">
        <div class="col-lg-4">
            <div class="col-lg-12 card h-100">
                <div class="col-lg-12">
                    <img src="/images/background/Logo.jpg" style="width:500px" alt="Logo de la empresa"/>
                </div>
            </div>
        </div>
        <div class="col-lg-8">
            <div id="carouselExampleIndicators" class="carousel slide" data-ride="carousel">
                <ol class="carousel-indicators">
                    <li data-target="#carouselExampleIndicators" data-slide-to="0" class="active"></li>
                    <li data-target="#carouselExampleIndicators" data-slide-to="1"></li>
                    <li data-target="#carouselExampleIndicators" data-slide-to="2"></li>
                </ol>
                <div class="carousel-inner">
                    <div class="carousel-item active">
                        <img class="d-block w-100" style="height: 90vh;" src="./images/background/bckgnd1.jpg" alt="First slide">
                        <div class="carousel-caption d-none d-md-block">
                            <h5>Entrena en silencio, haz que tus logros hablen por ti</h5>
                            <p>Con nuestros metodos, obtendras  los mejores resultados</p>
                        </div>
                    </div>
                    <div class="carousel-item">
                        <img class="d-block w-100" style="height: 90vh;" src="./images/background/bckgnd2.jpg" alt="Second slide">
                        <div class="carousel-caption d-none d-md-block">
                            <h5>Llega donde antes nunca habias soñado llegar</h5>
                            <p>Junto a nuestros entrenadores expertos en entrenamiento en cada ambito deportivo</p>
                        </div>
                    </div>
                    <div class="carousel-item">
                        <img class="d-block w-100" style="height: 90vh;" src="./images/background/bckgnd3.jpg" alt="Third slide">
                        <div class="carousel-caption d-none d-md-block">
                            <h5>Supera tus limites!!</h5>
                            <p>Diferentes planes de entrenamiento para sacar tu máximo potencial</p>
                        </div>
                    </div>
                </div>
                <a class="carousel-control-prev" href="#carouselExampleIndicators" role="button" data-slide="prev">
                    <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                    <span class="sr-only">Previous</span>
                </a>
                <a class="carousel-control-next" href="#carouselExampleIndicators" role="button" data-slide="next">
                    <span class="carousel-control-next-icon" aria-hidden="true"></span>
                    <span class="sr-only">Next</span>
                </a>
            </div>
        </div>
    </div>
</div>
@endsection
