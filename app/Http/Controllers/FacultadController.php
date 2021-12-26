<?php

namespace App\Http\Controllers;

use App\Models\Facultad;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

use Yajra\DataTables\Facades\DataTables as DataTables;

class FacultadController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function cargaDatos(Request $request)
    {
        if ($request->ajax()){
            $facultad = DB::select('CALL dbfacultades()');
            return response()->json($facultad);
        }
    }
    public function cargaDatosFP(Request $request)
    {
        if ($request->ajax()){
            $facultad = DB::select('CALL dbfacultades()');
            return response()->json($facultad);
        }
    }
    /**
     * Metodo para cargar Data de Facultades
     */
    public function cargaListaDatos(Request $request)
    {
        if ($request->ajax()){
            $facultad = DB::select('CALL dbfacultades()');
            return response()->json($facultad);
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
        {
            $facultad = new Facultad;
            $facultad->nomFacultad = $request->input('nomFacultad');
            $facultad->save();
            return redirect()->route('carrera.index');

        }
    }
    /**
     * Metodo para cargar data en combo Facultad
     */
    public function cargaCombo($id)
    {
        $facultad = DB::select('call cargaComboFacultad(?)',[$id]);
        return response()->json($facultad);
    }
    /**
     * Metodo para cargar data en combo Facultad para Periodo
     */
    public function cargaDatosFacuPeriodo($id)
    {
        $facultad = DB::select('call dbFacultadPeriodo(?);',[$id]);
        return response()->json($facultad);
    }
    /**
     * Metodo para cargar data en combo Actualiza Carrea
     */
    public function listaCombo($id)
    {
        $facultad = DB::select('call cargaComboFacultad(?)',[$id]);
        return response()->json($facultad);
    }
    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Facultad  $facultad
     * @return \Illuminate\Http\Response
     */
    public function show(Facultad $facultad)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Facultad  $facultad
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Facultad $facultad)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Facultad  $facultad
     * @return \Illuminate\Http\Response
     */
    public function destroy(Facultad $facultad)
    {
        //
    }
}
