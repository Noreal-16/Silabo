<?php

namespace App\Http\Controllers;

use App\Models\ciclos;
use Illuminate\Http\Request;

use Illuminate\Support\Facades\DB;

use Yajra\DataTables\Facades\DataTables as DataTables;
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

    public function cargaDatosCiclos(Request $request)
    {
        if ($request->ajax()){
            $ciclos = DB::select('CALL dbCiclos()');
            return response()->json($ciclos);
        }
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
