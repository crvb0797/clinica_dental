<?php

namespace App\Http\Controllers;

use App\Models\Inicio;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;

class InicioController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function index()
    {
        return view('modulos.Inicio');
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
                    'passwordN' => ['string', 'min:3', 'required']
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
                    'passwordN' => ['string', 'min:3', 'required']
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
                /* 'password' => $datos["passwordN"] */
            ]);
        }

        return redirect('mis-datos');
    }


    /* Otra función */
}
