<?php

namespace App\Http\Controllers;

use App\Models\Componente;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

use Yajra\DataTables\Facades\DataTables as DataTables;

class ComponenteController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        if($request->ajax()){
            $componentes = DB::select('CALL dbComponentes()');
            return DataTables::of($componentes)
                ->addIndexColumn('')
                ->addColumn('action', function($componentes){
                    $acciones ='<a href="javascript:void(0)"  class="edit btn btn-success btn-sm">Edit</a> <a href="javascript:void(0)" name="delete"  class="delete btn btn-danger btn-sm">Delete</a>';
                    //$acciones .='<button type="button" name="delete" id="" class="btn btn-danger btn-sm>Eliminar</button>';
                    return $acciones;
                })
                ->rawColumns(['action'])
                ->make(true);
        }
        return view('index.componentes');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $componente = new Componente;
        $componente->nombreComponente = $request->input('nComponentes');
        $componente->abreviatuta = $request->input('nAbreviatura');
        $componente->horas = $request->input('nHoras');
        $componente->save();
        return redirect()->route('componentes.index');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Componente  $componente
     * @return \Illuminate\Http\Response
     */
    public function show(Componente $componente)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Componente  $componente
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Componente $componente)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Componente  $componente
     * @return \Illuminate\Http\Response
     */
    public function destroy(Componente $componente)
    {
        //
    }
}
