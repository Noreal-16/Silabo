<?php

namespace App\Http\Controllers;

use App\Models\Informacion;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

use Yajra\DataTables\Facades\DataTables as DataTables;

class InformacionController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        if($request->ajax()){
            $asignatura = DB::select('CALL dbInfoAsignatura()');
            return DataTables::of($asignatura)
                ->addIndexColumn('')
                ->addColumn('action', function($asignatura){
                    $acciones ='<a href="javascript:void(0)" class="edit btn btn-success btn-sm">Edit</a> <a href="javascript:void(0)" name="delete"  class="delete btn btn-danger btn-sm">Delete</a>';
                    //$acciones .='<button type="button" name="delete" id="" class="btn btn-danger btn-sm>Eliminar</button>'; onclick="listaCarrerasFacultad('.$carreras->id.')"
                    return $acciones;
                })
                ->rawColumns(['action'])
                ->make(true);
        }
        return view('index.info');
    }

    public function cargaCombInformacion()
    {
        $asignatura = DB::select('call dbInfoAsignatura()');
        return response()->json($asignatura);
    }

    public function cargaDatosAsignatura($id)
    {
        $asignatura = DB::select('call  dbAsignaturaCiclos(?);',[$id]);
        return response()->json($asignatura);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $asignatura = new Informacion;
        $asignatura->asignatura=$request->input('nAsignatura');
        $asignatura->codigo=$request->input('nCodigo');
        $asignatura->tipoAsignatura=$request->input('ntAsignatura');
        $asignatura->rediseñoCurricular=$request->input('nCFC');
        $asignatura->ciclos_id=$request->input('nCiclos');
        $asignatura->creditos_id=$request->input('nCreditos');
        $asignatura->save();
        return redirect()->route('informacion.index');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Informacion  $informacion
     * @return \Illuminate\Http\Response
     */
    public function show(Informacion $informacion)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Informacion  $informacion
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Informacion $informacion)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Informacion  $informacion
     * @return \Illuminate\Http\Response
     */
    public function destroy(Informacion $informacion)
    {
        //
    }
}
