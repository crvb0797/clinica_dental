<?php

namespace App\Http\Controllers;

use App\Models\Secretarias;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;

class SecretariasController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }
    public function index()
    {
        if (auth()->user()->rol != "Administrador") {
            return redirect('inicio');
        }

        $secretarias = Secretarias::all()->where('rol', 'Secretaria');
        return view('modulos.Secretarias', compact('secretarias'));
    }

    public function store(Request $request)
    {
        $datos = request()->validate([
            'name' => ['required', 'string', 'max:255'],
            'email' => ['required', 'string', 'max:255', 'email', 'unique:users'],
            'password' => ['required', 'string', 'min:3'],
            'documento' => ['string'],
            'telefono' => ['string']
        ]);

        $secretarias = Secretarias::create([
            'name' => $datos["name"],
            'email' => $datos["email"],
            'password' => Hash::make($datos["password"]),
            'documento' => $datos["documento"],
            'telefono' => $datos["telefono"],
            'id_consultorio' => 0,
            'rol' => "Secretaria",
            'sexo' => ''
        ]);

        return redirect('secretarias')->with('secretariaCreada', 'si');
    }


    public function show($id)
    {
        if (auth()->user()->rol != "Administrador") {
            return redirect('inicio');
        }
        $secretarias = Secretarias::all()->where('rol', 'Secretaria');
        $secretaria = Secretarias::find($id);
        return view('modulos.Secretarias', compact('secretarias', 'secretaria'));
    }


    public function update(Request $request, Secretarias $id)
    {
        if ($id['email'] != request('email') && request('passwordN') != "") {
            $datos = request()->validate([
                'name' => ['required', 'string', 'max:255'],
                'email' => ['required', 'string', 'max:255', 'email', 'unique:users'],
                'passwordN' => ['required', 'string', 'min:3'],
                'documento' => ['string'],
                'telefono' => ['string']
            ]);
            DB::table('users')->where('id', $id["id"])->update([
                'name' => $datos["name"],
                'email' => $datos["email"],
                'password' => Hash::make($datos["passwordN"]),
                'documento' => $datos["documento"],
                'telefono' => $datos["telefono"],
            ]);
        } else if ($id['email'] != request('email') && request('passwordN') == "") {
            $datos = request()->validate([
                'name' => ['required', 'string', 'max:255'],
                'email' => ['required', 'string', 'max:255', 'email', 'unique:users'],
                'password' => ['required', 'string', 'min:3'],
                'documento' => ['string'],
                'telefono' => ['string']
            ]);
            DB::table('users')->where('id', $id["id"])->update([
                'name' => $datos["name"],
                'email' => $datos["email"],
                'password' => Hash::make($datos["password"]),
                'documento' => $datos["documento"],
                'telefono' => $datos["telefono"],
            ]);
        } else if ($id['email'] == request('email') && request('passwordN') != "") {
            $datos = request()->validate([
                'name' => ['required', 'string', 'max:255'],
                'email' => ['required', 'string', 'max:255', 'email'],
                'passwordN' => ['required', 'string', 'min:3'],
                'documento' => ['string'],
                'telefono' => ['string']
            ]);
            DB::table('users')->where('id', $id["id"])->update([
                'name' => $datos["name"],
                'email' => $datos["email"],
                'password' => Hash::make($datos["passwordN"]),
                'documento' => $datos["documento"],
                'telefono' => $datos["telefono"],
            ]);
        } else  if ($id['email'] == request('email') && request('passwordN') == "") {
            $datos = request()->validate([
                'name' => ['required', 'string', 'max:255'],
                'email' => ['required', 'string', 'max:255', 'email'],
                'password' => ['required', 'string', 'min:3'],
                'documento' => ['string'],
                'telefono' => ['string']
            ]);
            DB::table('users')->where('id', $id["id"])->update([
                'name' => $datos["name"],
                'email' => $datos["email"],
                'password' => Hash::make($datos["password"]),
                'documento' => $datos["documento"],
                'telefono' => $datos["telefono"],
            ]);
        }

        return redirect('secretarias');
    }

    public function destroy($id)
    {
        Secretarias::destroy($id);

        return redirect('secretarias');
    }
}
