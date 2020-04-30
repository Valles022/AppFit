<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Entrenamiento;
use App\Ejercicio;
use App\User;
use PDF;

class EntrenamientoController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */

     //Mostrar todos los entrenamientos segun persona logueada
    public function index()
    {
        $userLogued = Auth::user();

        $entrenamientos = Entrenamiento::all();

        if($userLogued->esEntrenador()){
            $entrenamientos = $userLogued->entrenamientos()->get();
        } else if($userLogued->esCliente()){
            $users = User::all()->where('objetivo',$userLogued->objetivo);

            $entrenamientos = [];

            foreach($users as $user){
                if($user->esEntrenador()){
                    $trainning = $user->entrenamientos()->get();
                    foreach($trainning as $train){
                        array_push($entrenamientos,$train);
                    }
                }
            }
        }
        

        return view('entrenamientos.list',compact('entrenamientos'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */

     //Descplegar vista para crear entrenamiento
    public function createEntrenamiento()
    {
        return view('entrenamientos.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */

     //Guardar entrenamiento
    public function storeEntrenamiento(Request $request)
    {
        $campoValidado = $request->validate([
            'tipo_entrenamiento' => 'required',
            'descripcion' => 'required',
        ]);

        $entrenamiento = Entrenamiento::create($campoValidado);

        $entrenamiento->users()->attach(Auth::user()->id);

        return redirect()->route('entrenamientos.list')->with('success','Entrenamiento creado correctamente.');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */

     //Mostrar el entrenamiento con sus ejercicios
    public function show($id)
    {
        $listaEjercicios = Ejercicio::all();

        $entrenamiento = Entrenamiento::findOrFail($id);
        
        $ejercicios = $entrenamiento->ejercicios()->get();

        if(Auth::user()->esCliente()){
            return view('entrenamientos.showToClient',compact('entrenamiento','ejercicios'));
        }
        return view('entrenamientos.show',compact('entrenamiento','ejercicios'));
    }

    //Devolver json de los ejercicios del entrenamiento
    public function getEjercicios($id)
    {
        $entrenamiento = Entrenamiento::findOrFail($id);
        
        $ejercicios = $entrenamiento->ejercicios()->get();

        $listaEjercicios = [];
        foreach($ejercicios as $ejercicio){
            $ejercicio->num_series = $ejercicio->pivot->num_series;
            $ejercicio->num_repes = $ejercicio->pivot->num_repes;

            array_push($listaEjercicios,$ejercicio);
        }
        return response()->json($listaEjercicios);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */

    //Desplegar vista de edicion entrenamiento
    public function edit($id)
    {
        $entrenamiento = Entrenamiento::findOrFail($id);

        return view('entrenamientos.edit',compact('entrenamiento'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    //Actualizar entrenamiento
    public function update(Request $request, $id)
    {
        $entrenamiento = Entrenamiento::findOrFail($id);

        $campoValidado = $request->validate([
            'tipo_entrenamiento' => 'required',
            'descripcion' => 'required',
        ]);

        $entrenamiento->update($campoValidado);

        return redirect()->route('entrenamientos.list')->with('success','Entrenamiento modificado correctamente.');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    //borrar entrenamiento
    public function destroy($id)
    {
        $entrenamiento = Entrenamiento::findOrFail($id);
        $entrenamiento->destroy($id);

        return redirect()->route('entrenamientos.list')->with('success','Entrenamiento eliminado correctamente.');
    }

    //Vincular un ejercicio al entrenamiento
    public function addEjercicio($entrenamientoid, $ejercicioid, $num_series, $num_repes)
    {
        $entrenamiento = Entrenamiento::findOrFail($entrenamientoid);

        $entrenamiento->ejercicios()->attach($ejercicioid, ['num_series' => $num_series , 'num_repes' => $num_repes]);

        return redirect()->route('entrenamientos.show',$entrenamientoid);
    }

    //Modificar un ejercicio vinculado al entrenamiento
    public function saveEjercicio($entrenamientoid, $ejercicioid, $num_series, $num_repes)
    {
        $entrenamiento = Entrenamiento::findOrFail($entrenamientoid);

        $atributos = [
            'num_series' => $num_series,
            'num_repes' => $num_repes
        ];

        $entrenamiento->ejercicios()->updateExistingPivot($ejercicioid, $atributos);

        return redirect()->route('entrenamientos.show',$entrenamientoid);
    }

    //Desvincular un ejercicio al entrenamiento
    public function dropEjercicio($entrenamientoid, $ejercicioid)
    {
        $entrenamiento = Entrenamiento::findOrFail($entrenamientoid);

        $entrenamiento->ejercicios()->detach($ejercicioid);

        return redirect()->route('entrenamientos.show',$entrenamientoid);
    }

    //Generar pdf del entrenamiento deseado
    public function downloadPDF($id){

        $entrenamiento = Entrenamiento::findOrFail($id);

        $ejercicios = $entrenamiento->ejercicios()->get();

        $pdf = PDF::loadView('entrenamientos.pdf', compact('entrenamiento','ejercicios'));
        
        return $pdf->download('entrenamiento.pdf');
    }
    
}
