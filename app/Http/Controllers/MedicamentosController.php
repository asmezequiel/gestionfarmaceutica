<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Requests\NuevoMedicamentoRequest;

use App\Perfil;
use App\Medicamento;

class MedicamentosController extends Controller
{
    /**
     * Se retorna json con todos los medicamentos, con su perfil de medicamento y su stock
     *
     * @return \Illuminate\Http\Response
     */
    public function index(){
        return response()->json([   'success'               => true,
                                    'lista_medicamentos'    => Medicamento::with(['perfil' , 'stock'])->get() ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create(NuevoMedicamentoRequest $request){     
        
        $perfilMedicamento  = Perfil::find( $request->input('perfil_medicamento_id') );
        $descripcion        = $request->input('descripcion');
        $codigo             = $request->input('codigo');
        $cant_blister       = $request->input('cant_blister');

        $nuevoMedicamento   = new Medicamento();
        $nuevoMedicamento->crear( $perfilMedicamento , $descripcion , $codigo , $cant_blister );

        return response()->json([ Medicamento::with('perfil')->latest()->first() ]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store()
    {

    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show(Request $request)
    {
        return response()->json([   'success'       => true,
                                    'medicamento'   => Medicamento::with(['perfil' , 'stock'])->find($request->id) ]);
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
    public function destroy(Request $request){
        return "hoola";
        return Medicamento::find($request->id)->deshabilitar();
    }
}
