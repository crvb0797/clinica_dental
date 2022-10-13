<?php

namespace App\Http\Controllers;

use App\Models\Inicio;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Storage;

class InicioController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function index()
    {
        $inicio = Inicio::find(1);
        return view('modulos.Inicio', compact('inicio'));
    }

    public function datosCreate()
    {
        return view('modulos.misDatos');
    }

    public function datosUpdate(Request $request)
    {
        /* dd($request->email); */
        if (auth()->user()->email != $request->email) {
            if (isset($request->passwordN)) {
                $datos = request()->validate([
                    'name' => ['required', 'string', 'max:255'],
                    'telefono' => ['string', 'max:255'],
                    'documento' => ['string', 'max:255'],
                    'email' => ['email', 'required', 'string', 'unique:users'],
                    'passwordN' => ['min:3', 'required']
                ]);
            } else {
                $datos = request()->validate([
                    'name' => ['required', 'string', 'max:255'],
                    'telefono' => ['string', 'max:255'],
                    'documento' => ['string', 'max:255'],
                    'email' => ['email', 'required', 'string', 'unique:users']
                ]);
            }
        } else {
            if (isset($request->passwordN)) {
                $datos = request()->validate([
                    'name' => ['required', 'string', 'max:255'],
                    'telefono' => ['string', 'max:255'],
                    'documento' => ['string', 'max:255'],
                    'email' => ['email', 'required', 'string'],
                    'passwordN' => ['min:3', 'required']
                ]);
            } else {
                $datos = request()->validate([
                    'name' => ['required', 'string', 'max:255'],
                    'telefono' => ['string', 'max:255'],
                    'documento' => ['string', 'max:255'],
                    'email' => ['email', 'required', 'string']
                ]);
            }
        }

        if (isset($request->passwordN)) {
            DB::table('users')->where('id', auth()->user()->id)->update([
                'name' => $datos['name'],
                'email' => $datos['email'],
                'documento' => $datos['documento'],
                'telefono' => $datos['telefono']
            ]);
        }else{
            DB::table('users')->where('id', auth()->user()->id)->update([
                'name' => $datos["name"],
                'email' => $datos["email"],
                'documento' => $datos["documento"],
                'telefono' => $datos["telefono"],
                'password' => Hash::make($datos["passwordN"])
            ]);
        }

        return redirect('mis-datos');
    }


    public function edit()
    {
        $inicio = Inicio::find(1);

        return view('modulos.editarInicio')->with('inicio', $inicio);
    }

    public function update(Request $request)
    {
        $datos = request();
        $inicio = Inicio::find(1);

        $inicio->dias = $datos["dias"];
        $inicio->horaInicio = $datos["horaInicio"];
        $inicio->horaFin = $datos["horaFin"];
        $inicio->direccion = $datos["direccion"];
        $inicio->telefono = $datos["telefono"];
        $inicio->email = $datos["email"];

        if (request('logoN')) {
            Storage::delete('public/'.$inicio->logo);
            $rutaImg = $request['logoN']->store('inicio', 'public');
            $inicio->logo = $rutaImg;
        }

        $inicio->save();

        return redirect('inicio-editar');
    }
}
