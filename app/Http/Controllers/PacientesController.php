<?php

namespace App\Http\Controllers;

use App\Models\Pacientes;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;

class PacientesController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }


    public function index()
    {
        if(auth()->user()->rol != "Administrador" && auth()->user()->rol != "Secretaria" && auth()->user()->rol != "Doctor"){
            return redirect('inicio');
        }

        $pacientes = DB::select('select * from users where rol = "Paciente"');
        return view('modulos.Pacientes')->with('pacientes', $pacientes);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        if(auth()->user()->rol != "Administrador" && auth()->user()->rol != "Secretaria"  && auth()->user()->rol != "Doctor"){
            return redirect('inicio');
        }

        return view('modulos.Crear-Paciente');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $datos = request()->validate([
            'name' => ['required'],
            'documento' => ['required'],
            'password' => ['required', 'string', 'min:3'],
            'email' => ['required', 'string', 'email', 'unique:users'],
            'telefono' => ['string']
        ]);

        Pacientes::create([
            'name' => $datos['name'],
            'id_consultorio' => 0,
            'email' => $datos['email'],
            'sexo' => '',
            'password' => Hash::make($datos['password']),
            'documento' => $datos['documento'],
            'telefono' => $datos['telefono'],
            'rol' => 'Paciente',
        ]);

        return redirect('pacientes')->with('agregado', 'si');
    }


    public function edit(Pacientes $id)
    {
        if(auth()->user()->rol != "Administrador" && auth()->user()->rol != "Secretaria" && auth()->user()->rol != "Doctor"){
            return redirect('inicio');
        }

        $paciente = Pacientes::find($id->id);

        return view('modulos.Editar-Paciente')->with('paciente', $paciente);
    }

    
    public function update(Request $request, Pacientes $paciente)
    {
        if ($paciente["email"] != request('email') && request('passwordN') != "") {
            $datos = request()->validate([
                'name' => ['required'],
                'documento' => ['required'],
                'passwordN' => ['required', 'string', 'min:3'],
                'email' => ['required', 'string', 'email', 'unique:users'],
                'telefono' => ['required']
            ]);  
            
            DB::table('users')->where('id', $paciente["id"])->update([
                'name' => $datos["name"], 'email' => $datos["email"], 'documento' => $datos["documento"], 'password' => Hash::make($datos["passwordN"]),'telefono' => $datos['telefono']
            ]);
        }else if($paciente["email"] != request('email') && request('passwordN') == ""){
            $datos = request()->validate([
                'name' => ['required', 'string', 'max:255'],
                'documento' => ['required'],
                'password' => ['required', 'string', 'min:3'],
                'email' => ['required', 'string', 'email', 'unique:users'],
                'telefono' => ['required']
            ]);  
            
            DB::table('users')->where('id', $paciente["id"])->update([
                'name' => $datos["name"], 'email' => $datos["email"], 'documento' => $datos["documento"], 'password' => Hash::make($datos["password"]),'telefono' => $datos['telefono']
            ]);
        }else if($paciente["email"] == request('email') && request('passwordN') != ""){
            $datos = request()->validate([
                'name' => ['required', 'string', 'max:255'],
                'documento' => ['required'],
                'passwordN' => ['required', 'string', 'min:3'],
                'email' => ['required', 'string', 'email'],
                'telefono' => ['required']
            ]);  
            
            DB::table('users')->where('id', $paciente["id"])->update([
                'name' => $datos["name"], 'email' => $datos["email"], 'documento' => $datos["documento"], 'password' => Hash::make($datos["passwordN"]),'telefono' => $datos['telefono']
            ]);
        }  else {
            $datos = request()->validate([
                'name' => ['required', 'string', 'max:255'],
                'documento' => ['required'],
                'password' => ['required', 'string', 'min:3'],
                'email' => ['required', 'string', 'email'],
                'telefono' => ['required']
            ]);  
            
            DB::table('users')->where('id', $paciente["id"])->update([
                'name' => $datos["name"], 'email' => $datos["email"], 'documento' => $datos["documento"], 'password' => Hash::make($datos["password"]),'telefono' => $datos['telefono']
            ]);
        }

        return redirect('pacientes')->with('actualizadoP', 'si');
    }

    public function destroy($id)
    {
        Pacientes::destroy($id);

        return redirect('pacientes');
    }
}
