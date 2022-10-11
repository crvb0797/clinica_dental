<?php

namespace App\Http\Controllers;

use App\Models\Consultorios;
use App\Models\Doctores;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;

class DoctoresController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function index()
    {
         if(auth()->user()->rol != "Administrador" && auth()->user()->rol != "Secretaria"){
            return redirect('inicio');
        }

        $consultorios = Consultorios::all();
        $doctores = Doctores::all();

        return view('modulos.Doctores', compact('consultorios', 'doctores'));
    }

    
    public function store(Request $request)
    {
        $datos = request()->validate([
            'name' => ['required'],
            'sexo' => ['required'],
            'id_consultorio' => ['required'],
            'password' => ['required', 'string', 'min:3'],
            'email' => ['required', 'string', 'email', 'unique:users']
        ]);

        Doctores::create([
            'name' => $datos['name'],
            'id_consultorio' => $datos['id_consultorio'],
            'email' => $datos['email'],
            'sexo' => $datos['sexo'],
            'password' => Hash::make($datos['password']),
            'documento' => '',
            'telefono' => '',
            'rol' => 'Doctor',
        ]);

        return redirect('doctores')->with('registrado', 'si');
    }

    
    public function destroy($id)
    {
        DB::table('users')->whereId($id)->delete();

        return redirect('doctores');
    }
}
