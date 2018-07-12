<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\EstadoRutina;

class EstadoRutinaController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return EstadoRutina::select('tgm_cliente_id', 'tgm_rutina_id', 'estado')->get();
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        EstadoRutina::insert([
            'tgm_cliente_id' => $request->tgm_cliente_id,
            'tgm_rutina_id' => $request->tgm_rutina_id,
            'estado' => false
        ]);
        return ['created' => true];
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        return EstadoRutina::select('tgm_cliente_id', 'tgm_rutina_id', 'estado')->where('id', $id)->first();
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        EstadoRutina::where('id', $id)->update(['estado'=>true]);
        return ['updated' => true];
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        EstadoRutina::destroy($id);
        return ['deleted' => true];
    }
}
