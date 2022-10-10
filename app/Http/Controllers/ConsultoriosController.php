<?php

namespace App\Http\Controllers;

use App\Models\Consultorios;
use Illuminate\Http\Request;
use PhpParser\Node\Stmt\Const_;

class ConsultoriosController extends Controller
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
        return view('modulos.Consultorios')->with('consultorios', $consultorios);
    }

    
    public function store(Request $request)
    {
        Consultorios::create(['consultorio' => request('consultorio')]);
        return redirect('consultorios');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Consultorios  $consultorios
     * @return \Illuminate\Http\Response
     */
    public function show(Consultorios $consultorios)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Consultorios  $consultorios
     * @return \Illuminate\Http\Response
     */
    public function edit(Consultorios $consultorios)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Consultorios  $consultorios
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Consultorios $consultorios)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Consultorios  $consultorios
     * @return \Illuminate\Http\Response
     */
    public function destroy(Consultorios $consultorios)
    {
        //
    }
}
