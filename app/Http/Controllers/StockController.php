<?php

namespace App\Http\Controllers;

use App\Stock;
use App\Medicamento;
use Illuminate\Http\Request;

class StockController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
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
     *
     *  llega un objeto del tipo "medicamento" en request {'medicamento'}  
     *  del stock = { 'stock' , 'lote' , 'f_vencimiento' , 'empresa' }
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {   
        try {
            $empresa    = $request->input('empresa');
            $cant       = $request->input('stock');
            $lote       = $request->input('lote');
            $fecha      = $request->input('f_vencimiento');
            $medicamento_id = $request->input('medicamento.id');

            $stock = new Stock();
            $medicamento = Medicamento::find( $medicamento_id );
            
            if ( $stock->crear($empresa , $cant , $lote , $fecha , $medicamento) ) {
                return response()->json([   'success'           => true ,
                                            'mensaje'           => 'Stock dado de alta.',]);
            } else {
                return response()->json([   'success'           => false ,
                                            'mensaje'           => 'Hubo un error.',]);
            }
        } catch (\Exception $e) {
            return response()->json([   'success'           => false ,
                                        'mensaje'           => $e->getMessage(),]);
        }

    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Stock  $stock
     * @return \Illuminate\Http\Response
     */
    public function show(Stock $stock)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Stock  $stock
     * @return \Illuminate\Http\Response
     */
    public function edit(Stock $stock)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Stock  $stock
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Stock $stock)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Stock  $stock
     * @return \Illuminate\Http\Response
     */
    public function destroy(Stock $stock)
    {
        //
    }
}
