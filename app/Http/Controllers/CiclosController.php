<?php

namespace App\Http\Controllers;

use App\Models\ciclos;
use Illuminate\Http\Request;

class CiclosController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
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
        $ciclo = new ciclos;
        $ciclo->nombreCiclo = $request->input('comboCiclo');
        $ciclo->paralelo = $request->input('nomParalelo');
        $ciclo->periodo_id = $request->input('comboPeriodoAc');
        $ciclo->save();
        return redirect()->route('periodos.index');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\ciclos  $ciclos
     * @return \Illuminate\Http\Response
     */
    public function show(ciclos $ciclos)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\ciclos  $ciclos
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, ciclos $ciclos)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\ciclos  $ciclos
     * @return \Illuminate\Http\Response
     */
    public function destroy(ciclos $ciclos)
    {
        //
    }
}
