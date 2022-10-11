<?php

namespace App\Http\Controllers;

use App\Models\Pacientes;
use Illuminate\Http\Request;

class PacientesController extends Controller
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

        return view('modulos.Pacientes');
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Pacientes  $pacientes
     * @return \Illuminate\Http\Response
     */
    public function show(Pacientes $pacientes)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Pacientes  $pacientes
     * @return \Illuminate\Http\Response
     */
    public function edit(Pacientes $pacientes)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Pacientes  $pacientes
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Pacientes $pacientes)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Pacientes  $pacientes
     * @return \Illuminate\Http\Response
     */
    public function destroy(Pacientes $pacientes)
    {
        //
    }
}
