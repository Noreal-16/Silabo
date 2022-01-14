<?php

namespace App\Http\Controllers;

use App\Models\SubContenido;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

use Yajra\DataTables\Facades\DataTables as DataTables;

class SubContenidoController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        //
        
        return view('resultados.index');
    }
   

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $subcontenido = new SubContenido;
        $subcontenido->nombreSubContenido=$request->input('nombreSubContenido');
        $subcontenido->contenido_id=$request->input('unidades');
        $subcontenido->save();
        return redirect()->route('resultados.index');

    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\SubContenido  $SubContenido
     * @return \Illuminate\Http\Response
     */
    public function show(SubContenido $SubContenido)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \App\Models\SubContenido  $SubContenido
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, SubContenido $SubContenido)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\SubContenido  $SubContenido
     * @return \Illuminate\Http\Response
     */
    public function destroy(SubContenido $SubContenido)
    {
        //
    }
}
