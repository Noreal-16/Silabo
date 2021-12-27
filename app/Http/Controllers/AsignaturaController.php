<?php

namespace App\Http\Controllers;

use App\Models\Asignatura;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

use Yajra\DataTables\Facades\DataTables as DataTables;

class AsignaturaController extends Controller
{    
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        //
        if($request->ajax()){
            $asignatura = DB::select('CALL dbAsignaturas()');
            return DataTables::of($asignatura)
                ->addIndexColumn('')
                ->addColumn('action', function($asignatura){
                    $acciones ='<a href="javascript:void(0)" onclick="editAsignatura('.$asignatura->id.')" class="edit btn btn-success btn-sm">Edit</a> <a href="javascript:void(0)" name="delete"  class="delete btn btn-danger btn-sm">Delete</a>';
                    //$acciones .='<button type="button" name="delete" id="" class="btn btn-danger btn-sm>Eliminar</button>'; onclick="listaCarrerasFacultad('.$carreras->id.')"
                    return $acciones;
                })
                ->rawColumns(['action'])
                ->make(true);
        }
        return view('index.asignatura');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $asignatura = new Asignatura;
        $asignatura->presentacion=$request->input('presentacion');
        $asignatura->contextualizacion=$request->input('contextualizacion');
        $asignatura->contribucion=$request->input('contribucion');
        $asignatura->prerequisitos=$request->input('prerrequisitos');
        $asignatura->adaptaciones=$request->input('adaptaciones');
        $asignatura->informacion_id=1;
        $asignatura->save();
        return redirect()->route('asignatura.index');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Asignatura  $asignatura
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $asignatura = DB::select('call getAsigById(?)', [$id]);
        return response()->json($asignatura);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Asignatura  $asignatura
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Asignatura $asignatura)
    {
        $carrera = DB::select('call updateAsignatura(?,?,?,?,?,?,?)',[
            $request->id,
            $request->presentacion,
            $request->contextualizacion,
            $request->contribucion,
            $request->prerequisitos,
            $request->adaptaciones,
            $request->informacion_id,

           ]);
        return back();
    }




    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Asignatura  $asignatura
     * @return \Illuminate\Http\Response
     */
    public function destroy(Asignatura $asignatura)
    {
        //
    }
}
