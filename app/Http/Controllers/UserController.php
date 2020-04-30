<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\User;
use App\Entrenamiento;

class UserController extends Controller
{


    public function index(){
        $user = Auth::user();

        if($user->esCliente()){
            return redirect('/homeClientes');
        } else if($user->esEntrenador()){
            return redirect('/listaClientes');
        } else{
            return redirect('/listUsuarios');
        }
    }

    public function edit($id){
        $user = User::findOrFail($id);

        return view('usuarios.edit', compact('user'));
    }

    public function update(Request $request, $id){

        $user = User::findOrFail($id);

        $request->validate([
            'name' => 'required',
            'email' => 'required',
            'objetivo' => 'required',
        ]);

        if($request->hasFile('imagen')){
            $imageName = time().'.'.$request->imagen->extension();
            $request->imagen->move(public_path('images/usuarios'), $imageName);

            $campoValidado = [
                'name' => $request->name,
                'email' => $request->email,
                'objetivo' => $request->objetivo,
                'imagen' => $imageName,
            ];
        } else{
            $campoValidado = [
                'name' => $request->name,
                'email' => $request->email,
                'objetivo' => $request->objetivo,
            ];
        }

        $user->update($campoValidado);

        $role = $user->roles()->get()->first();

        $user->roles()->detach($role);

        $user->roles()->attach($request->role);

        return redirect('home');
    }

    public function delete($id){
        
        $user = User::findOrFail($id);

        $role = $user->roles()->get()->first();

        $user->roles()->detach($role);

        $user->destroy($id);

        return redirect('home');
    }

    public function listClientes()
    {
        $entrenador = Auth::user();

        $entrenamientos = $entrenador->entrenamientos()->get();

        $users = User::all()->where('objetivo',$entrenador->objetivo);

        $clientes = [];

        foreach($users as $user){
            if($user->esCliente()){
                array_push($clientes,$user);
            }
        }

        return view('homeEntrenador',compact('clientes','entrenamientos'));
    }

    public function listUsuarios()
    {
        $usuarios = User::all();

        return view('home',compact('usuarios'));
    }

    public function asignEntrenamiento($entrenamientoid, $userid)
    {
        $user = User::findOrFail($userid);

        $anteriorEntrenament = $user->entrenamientos()->get()->first();
        if($anteriorEntrenament){
            $user->entrenamientos()->detach($anteriorEntrenament->id);
        }
        $user->entrenamientos()->attach($entrenamientoid);

        return redirect()->route('clientes.list');
    }

    public function getClientes()
    {
        $entrenador = Auth::user();

        $users = User::all()->where('objetivo',$entrenador->objetivo);

        $clientes = [];

        foreach($users as $user){
            if($user->esCliente()){
                $entrenamiento = $user->entrenamientos()->get()->first();
                $user->entrenamiento = $entrenamiento;
                array_push($clientes,$user);
            }
        }

        return response()->json($clientes);
    }

    public function getEntrenamientos()
    {
        $user = Auth::user();

        $entrenamientos = Entrenamiento::all();
        if($user->esEntrenador()){
            $entrenamientos = $user->entrenamientos()->get();
        }
        
        return response()->json($entrenamientos);
    }
    public function homeClientes(){
        $user = Auth::user();

        $entrenamiento = $user->entrenamientos()->get()->first();

        if($entrenamiento == null){
            $ejercicios = null;
        } else{
            $ejercicios = $entrenamiento->ejercicios()->get();
        }
        return view('homeCliente',compact('ejercicios','entrenamiento'));
    }
}
