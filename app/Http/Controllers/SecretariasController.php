<?php

namespace App\Http\Controllers;

use App\Models\Secretarias;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

class SecretariasController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }
    public function index()
    {
        if(auth()->user()->rol != "Administrador"){
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
            'name'=>$datos["name"],
            'email'=>$datos["email"],
            'password'=>Hash::make($datos["password"]),
            'documento'=>$datos["documento"],
            'telefono'=>$datos["telefono"],
            'id_consultorio' => 0,
            'rol' => "Secretaria",
            'sexo' => ''
        ]); 
        
        return redirect('secretarias')->with('secretariaCreada', 'si');
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Secretarias  $secretarias
     * @return \Illuminate\Http\Response
     */
    public function edit(Secretarias $secretarias)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Secretarias  $secretarias
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Secretarias $secretarias)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Secretarias  $secretarias
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        Secretarias::destroy($id);

        return redirect('secretarias');
    }
}
