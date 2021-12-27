<?php

namespace App\Http\Controllers;

use App\Models\periodoAcademico;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

use Yajra\DataTables\Facades\DataTables as DataTables;

class PeriodoAcademicoController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        if($request->ajax()){
            $periodos = DB::select('CALL dbCiclosPeriodos()');
            return DataTables::of($periodos)
                ->addIndexColumn('')
                ->addColumn('action', function($periodos){
                    $acciones ='<a href="javascript:void(0)"  class="edit btn btn-success btn-sm">Edit</a> <a href="javascript:void(0)" name="delete"  class="delete btn btn-danger btn-sm">Delete</a>';
                    //$acciones .='<button type="button" name="delete" id="" class="btn btn-danger btn-sm>Eliminar</button>';
                    return $acciones;
                })
                ->rawColumns(['action'])
                ->make(true);
        }
        return view('index.periodoAc');
    }
    /**
     * Carga datos de periodo academico
     */
    public function cargaDatosComboPeriodo(Request $request)
    {
        if ($request->ajax()){
            $periodos = DB::select('CALL dbPeriodos()');
            return response()->json($periodos);
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
        $periodos = new periodoAcademico;
        $periodos->fechaInicio = $request->input('nFechaInicio');
        $periodos->fechaFin = $request->input('nFechaFin');
        $periodos->carrera_id = $request->input('comboCarrera');
        $periodos->save();

        return redirect()->route('periodos.index');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\periodoAcademico  $periodoAcademico
     * @return \Illuminate\Http\Response
     */
    public function show(periodoAcademico $periodoAcademico)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\periodoAcademico  $periodoAcademico
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, periodoAcademico $periodoAcademico)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\periodoAcademico  $periodoAcademico
     * @return \Illuminate\Http\Response
     */
    public function destroy(periodoAcademico $periodoAcademico)
    {
        //
    }
}
