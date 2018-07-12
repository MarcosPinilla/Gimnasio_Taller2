<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Cliente;

use App\Http\Controllers\AuthenticateController;

class ClienteController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return Cliente::select('id', 'nombre','apellido')->get();
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
        return Cliente::insertGetId([
            'nombre' => $request->nombre,
            'apellido' => $request->apellido
        ]);
        
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        return Cliente::select('nombre', 'apellido')->where('id', $id)->first();
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
        $cliente = Cliente::find($id);
        $cliente->update($request->all());
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
        Cliente::destroy($id);
        return ['deleted' => true];
    }

    public function obtenerHistorialCliente(AuthenticateController $auth) {

        $user = \JWTAuth::parseToken()->authenticate();

        return Cliente::with('estados.historiales', 'estados.rutina')
            ->join('tgm_estado_rutina', 'tgm_cliente.id', '=', 'tgm_estado_rutina.tgm_cliente_id')
            ->where([['tgm_cliente.id', $user->tgm_cliente_id],['tgm_estado_rutina.estado', false]])
            ->first();

    }

    public function obtenerHistorialyRutina($id) {

        return Cliente::with('estados.historiales', 'estados.rutina')
            ->where('tgm_cliente.id', $id)
            ->first();

    }
}
