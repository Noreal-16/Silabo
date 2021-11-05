<?php

namespace App\Http\Controllers;

use App\Models\Departamento;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

use Yajra\DataTables\Facades\DataTables as DataTables;
class DepartamentoController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function cargaDatos(Request $request)
    {
        if ($request->ajax()){
            $departamento = DB::select('CALL dbDepartamentos()');
            return response()->json($departamento);
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
        //Metodo para Registrar departamentos
        $departamento = new Departamento;
        $departamento->nomDepartamento = $request->input('nomDepartamento');
        $departamento->facultad_id = $request->input('nFacultad');
        $departamento->save();
        return redirect()->route('carrera.index');
    }
    /**
     * Metodo para cargar datos de Departamentos
     */
    public function cargaComDepartamento($id)
    {
        $departamento = DB::select('call cargaComboDepartamento(?)',[$id]);
        return response()->json($departamento);
    }
    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Departamento  $departamento
     * @return \Illuminate\Http\Response
     */

    public function show(Departamento $departamento)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Departamento  $departamento
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Departamento $departamento)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Departamento  $departamento
     * @return \Illuminate\Http\Response
     */
    public function destroy(Departamento $departamento)
    {
        //


        
    }
}
