<!doctype html>
<html>
    <head>
        <meta charset="utf-8">
        <title>{{ $entrenamiento->tipo_entrenamiento }}</title>
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
        <script src="{{ asset('js/app.js') }}" defer></script>
        <style>
            body{
                text-align: center
            }
            table {
            border-collapse: collapse;
            }

            table, th, td {
            border: 1px solid black;
            text-align: center;
            }
            th, td {
            padding: 15px;
            text-align: left;
            }

            th{
                font-weight: bold;
            }
        </style>
    
    </head>
    <body>
        <div >
            <div >
                <div>
                    <h2>
                        <a class="" href="" id=""> </a>
                    </h2>
                </div>
                <div>
                    <h2>{{ $entrenamiento->tipo_entrenamiento }}</h2>
                </div>
                <div class="">
                    <h2><a class="" href=""> </a></h2>
                </div>
            </div>
        </div>

        <div >
            <div >
                <h3>Descripcion: </h3>
                <p class=>{{ $entrenamiento->descripcion }}</p>
            </div>
            <div>
                <table>
                <thead>
                    <tr>
                        <td>Nombre del ejercicio</td>
                        <td>Grupo Muscular principal</td>
                        <td>Descripcion</td>
                        <td>Imagen</td>
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
            </div>
        </div>
    </body>
</html>