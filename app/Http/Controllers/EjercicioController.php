<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Ejercicio;
use App\Entrenamiento;
use Illuminate\Support\Facades\Auth;

class EjercicioController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $ejercicios = Ejercicio::all();

        return view('ejercicios.list',compact('ejercicios'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function createEjercicio()
    {
        return view('ejercicios.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function storeEjercicio(Request $request)
    {
        $request->validate([
            'nombre' => 'required',
            'musculo' => 'required',
            'descripcion' => 'required',
            'imagen' => 'required|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
        ]);

        $imageName = time().'.'.$request->imagen->extension();  
   
        $request->imagen->move(public_path('images/ejercicios'), $imageName);

        $campoValidado = [
            'nombre' => $request->nombre,
            'musculo' => $request->musculo,
            'descripcion' => $request->descripcion,
            'imagen' => $imageName,
        ];

        Ejercicio::create($campoValidado);

        return redirect()->route('ejercicios.list')->with('success','Ejercicio creado correctamente.');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $ejercicio = Ejercicio::findOrFail($id);

        return view('ejercicios.edit',compact('ejercicio'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $ejercicio = Ejercicio::findOrFail($id);

        $request->validate([
            'nombre' => 'required',
            'musculo' => 'required',
            'descripcion' => 'required',
        ]);

        if($request->hasFile('imagen')){
            $imageName = time().'.'.$request->imagen->extension();
            $request->imagen->move(public_path('images/ejercicios'), $imageName);

            $campoValidado = [
                'nombre' => $request->nombre,
                'musculo' => $request->musculo,
                'descripcion' => $request->descripcion,
                'imagen' => $imageName,
            ];
        } else{
            $campoValidado = [
                'nombre' => $request->nombre,
                'musculo' => $request->musculo,
                'descripcion' => $request->descripcion,
            ];
        }
   
        

        $ejercicio->update($campoValidado);

        return redirect()->route('ejercicios.list')->with('success','Ejercicio modificado correctamente.');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $ejercicio = Ejercicio::findOrFail($id);
        $ejercicio->destroy($id);

        return redirect()->route('ejercicios.list')->with('success','Ejercicio eliminado correctamente.');
    }

    public function getListEjercicios(){
        $ejercicios = Ejercicio::all();

        return response()->json($ejercicios);
    }

    public function searchEjercicio($search){

        if($search == '+'){
            $ejercicios = Ejercicio::all();
        } else{
            $criterio = "%$search%";

            $ejercicios = Ejercicio::where('nombre','like',$criterio)->get();
        }

        return response()->json($ejercicios);
    }
}
