<?php

namespace App\Http\Controllers;

use App\Models\Carrera;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

use Yajra\DataTables\Facades\DataTables as DataTables;

class CarreraController extends Controller
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
            $carreras = DB::select('CALL dbCarreras()');
            return DataTables::of($carreras)
                ->addIndexColumn('')
                ->addColumn('action', function($carreras){
                    $acciones ='<a href="javascript:void(0)" onclick="listaCarrerasFacultad('.$carreras->id.')" class="edit btn btn-success btn-sm">Edit</a> <a href="javascript:void(0)" name="delete"  class="delete btn btn-danger btn-sm">Delete</a>';
                    //$acciones .='<button type="button" name="delete" id="" class="btn btn-danger btn-sm>Eliminar</button>';
                    return $acciones;
                })
                ->rawColumns(['action'])
                ->make(true);
        }
        return view('index.carrera');
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
        $carrera = new Carrera;
        $carrera->nombCarrera =$request->input('nomCarrera');
        $carrera->modalidad =$request->input('nombModalidad');
        $carrera->departamento_id =$request->input('nombDepartamento');
        $carrera->save();
        return redirect()->route('carrera.index');
    }

    public function cargaDatosComboCarreras(Request $request)
    {
        if ($request->ajax()){
            $carrera = DB::select('CALL comboCarreras()');
            return response()->json($carrera);
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Carrera  $carrera
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $carreras = DB::select('call lista_carrera(?)', [$id]);
        return response()->json($carreras);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Carrera  $carrera
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Carrera $carrera)
    {
        $carrera = DB::select('call updateCarrera(?,?,?,?)',[
            $request->id,
            $request->nombCarrera,
            $request->modalidad,
            $request->departamento_id,
           ]);
        return back();
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Carrera  $carrera
     * @return \Illuminate\Http\Response
     */
    public function destroy(Carrera $carrera)
    {
        //
    }
}
