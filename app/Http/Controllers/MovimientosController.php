<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\User;
use App\MovimientoUsuario;
use App\DetalleMovimiento;

class MovimientosController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return response()->json([   'success'      => true,
                                    'usuarios'     => User::whereHas('movimientos')->with(['perfil' , 'movimientos'])->get(),
                            ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create(Request $request)
    {
        $tipo_movimiento = $request->input('tipo_movimiento');

        $movimiento = new MovimientoUsuario();
        if ($tipo_movimiento == "baja") {
            $movimiento->cliente()->associate( Cliente::find($request->input('cliente_id')) );
            $movimiento->medico()->associate( Medico::find($request->input('medico_id')) );
        } else {
            $movimiento->remito = $request->input('num_remito');
        }
        $movimiento->usuario()->associate( Auth::User() );

        if ($movimiento->save()) {
            foreach ($request->input('detalle_movimientos') as $detalle) {

                $detalle        = new DetalleMovimiento();
                $medicamento    = Medicamento::find( $detalle->medicamento_id );
                $cant           = $detalle->cant,
                $detalle->crear(    $movimiento->getNumeroMovimiento(),
                                    $medicamento,
                                    $cant );
                $stock = $medicamento->stock;
                ($tipo_movimiento == "baja") ? $stock->bajarStock($cant) : $stock->altaStock($cant);
            }
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
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show(Request $request)
    {
        return MovimientoUsuario::where('num_movimiento' , $request->input('num_movimiento'))
                            ->with(['medico' , 'cliente' , 'detalle.medicamento.perfil'])
                            ->get();
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
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
