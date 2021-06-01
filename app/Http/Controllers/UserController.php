<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\User;
use App\Entrenamiento;

class UserController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }
    public function index(){
        $user = Auth::user();

        if($user->role_id == 3){
            return redirect('/homeClientes');
        } else if($user->role_id == 2){
            return view('homeEntrenador');
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
                'role_id' => $request->role,
                'imagen' => $imageName,
            ];
        } else{
            $campoValidado = [
                'name' => $request->name,
                'email' => $request->email,
                'role_id' => $request->role,
                'objetivo' => $request->objetivo,
            ];
        }

        $user->update($campoValidado);

        return redirect('/');
    }

    public function delete($id){
        
        $user = User::findOrFail($id);

        $user->destroy($id);

        return redirect('/');
    }

    //Devuelve la vista home de administrador con una lista de todos los usuarios
    public function listUsuarios()
    {
        $usuarios = User::all();

        return view('home',compact('usuarios'));
    }

    //Asigna un entrenamiento nuevo al cliente borrando la relación con el anterior segun los parametros enviados des de un componente de la vista homeEntrenaodres
    public function asignEntrenamiento($entrenamientoid, $userid)
    {
        $user = User::findOrFail($userid);

        $anteriorEntrenament = $user->entrenamientos()->get()->first();
        if($anteriorEntrenament){
            $user->entrenamientos()->detach($anteriorEntrenament->id);
        }
        $user->entrenamientos()->attach($entrenamientoid);

        return redirect('/');
    }

    //Devuelve los usuarios clientes que tengan el mismo objetivo que el entrenador
    public function getClientes()
    {
        $entrenador = Auth::user();

        $users = User::all()->where('objetivo',$entrenador->objetivo);

        $clientes = [];

        foreach($users as $user){
            if($user->role_id == 3){
                $entrenamiento = $user->entrenamientos()->get()->first();
                $user->entrenamiento = $entrenamiento;
                array_push($clientes,$user);
            }
        }

        return response()->json($clientes);
    }

    //Devuelve todos los entrenamientos y en caso del que usuario autenticado sea un entrenador, devuelve los entrenamientos creados por ese entrenador
    public function getEntrenamientos()
    {
        $user = Auth::user();

        $entrenamientos = Entrenamiento::all();
        if($user->role_id == 2){
            $entrenamientos = $user->entrenamientos()->get();
        }
        
        return response()->json($entrenamientos);
    }

    //Devuelve la vista home de clientes junto con el entrenamiento del cliente y los ejercicios del entrenamiento
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
