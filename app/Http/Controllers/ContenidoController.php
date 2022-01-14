<?php

namespace App\Http\Controllers;

use App\Models\Contenido;
use App\Models\resultadoContenido;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

use Yajra\DataTables\Facades\DataTables as DataTables;

class ContenidoController extends Controller
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
            $contenido = DB::select('CALL dbContenido()');
            return DataTables::of($contenido)
                ->addIndexColumn('')
                ->addColumn('action', function($contenido){
                    $acciones ='<a href="javascript:void(0)" onclick="" class="edit btn btn-success btn-sm">Edit</a> <a href="javascript:void(0)" name="delete"  class="delete btn btn-danger btn-sm">Delete</a>';
                    //$acciones .='<button type="button" name="delete" id="" class="btn btn-danger btn-sm>Eliminar</button>';
                    return $acciones;
                })
                ->rawColumns(['action'])
                ->make(true);
        }
        return view('resultados.index');
    }

    public function cargaComContenidos($id)
    {
        $contenido = DB::select('call cargaComContenidos(?);',[$id]);
        return response()->json($contenido);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $contenido = new Contenido;
        $contenido->nombreContenido=$request->input('nombreContenido');
        $contenido->save();
        

        $resultadoContenido = new resultadoContenido;
        $resultadoContenido -> resultado_id=$request->input('cbselecResultado');
        $resultadoContenido -> contenido_id=$contenido->id; //Se obtiene ultimo id del objeto guardado
        $resultadoContenido -> save();
        return redirect()->route('resultados.index');

    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Contenido  $Contenido
     * @return \Illuminate\Http\Response
     */
    public function show(Contenido $Contenido)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \App\Models\Contenido  $Contenido
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Contenido $Contenido)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Contenido  $Contenido
     * @return \Illuminate\Http\Response
     */
    public function destroy(Contenido $Contenido)
    {
        //
    }
}
