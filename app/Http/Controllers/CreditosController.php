<?php

namespace App\Http\Controllers;

use App\Models\Creditos;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

use Yajra\DataTables\Facades\DataTables as DataTables;

class CreditosController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        if($request->ajax()){
            $creditos = DB::select('CALL dbCreditos()');
            return DataTables::of($creditos)
                ->addIndexColumn('')
                ->addColumn('action', function($creditos){
                    $acciones ='<a href="javascript:void(0)"  class="edit btn btn-success btn-sm">Edit</a> <a href="javascript:void(0)" name="delete"  class="delete btn btn-danger btn-sm">Delete</a>';
                    //$acciones .='<button type="button" name="delete" id="" class="btn btn-danger btn-sm>Eliminar</button>';
                    return $acciones;
                })
                ->rawColumns(['action'])
                ->make(true);
        }
        return view('index.creditos');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $creditos = new Creditos;
        $creditos->creditos=$request->input('nCreditos');
        $creditos->horas=$request->input('nHorasCreditos');
        $creditos->B1=$request->input('nB1');
        $creditos->B2=$request->input('nB2');
        $creditos->save();
        return redirect()->route('creditos.index');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Creditos  $creditos
     * @return \Illuminate\Http\Response
     */
    public function show(Creditos $creditos)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Creditos  $creditos
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Creditos $creditos)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Creditos  $creditos
     * @return \Illuminate\Http\Response
     */
    public function destroy(Creditos $creditos)
    {
        //vas
    }

    public function cargaCombo($id){
        $creditos = DB::select('call cargaHoras(?)',[$id]);
        return response()->json($creditos);
    }

    public function dataCreditos(Request $request){
        if ($request->ajax()){
            $creditos = DB::select('CALL dbCreditos1()');
            return response()->json($creditos);
        }
    }
}
