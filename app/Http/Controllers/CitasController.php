<?php

namespace App\Http\Controllers;

use App\Models\Citas;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class CitasController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function index($id)
    {
        if (auth()->user()->rol == "Doctor" && $id != auth()->user()->id) {
            return redirect('inicio');
        }

        $horarios = DB::select('select * from horarios where id_doctor = '.$id);

        return view('modulos.Citas')->with('horarios', $horarios);
    }

    public function HorarioDoctor(Request $request)
    {
        $datos = request();

        DB::table('horarios')->insert(['id_doctor' => auth()->user()->id, 'horaInicio' => $datos["horaInicio"], 'horaFin' => $datos["horaFin"]]);

        return redirect('citas/'.auth()->user()->id);
    }
   
   
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Citas  $citas
     * @return \Illuminate\Http\Response
     */
    public function show(Citas $citas)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Citas  $citas
     * @return \Illuminate\Http\Response
     */
    public function edit(Citas $citas)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Citas  $citas
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Citas $citas)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Citas  $citas
     * @return \Illuminate\Http\Response
     */
    public function destroy(Citas $citas)
    {
        //
    }
}
