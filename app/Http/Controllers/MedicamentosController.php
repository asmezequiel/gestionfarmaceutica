<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Requests\NuevoMedicamentoRequest;

use App\PerfilMedicamento;
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
    public function create(){     
        
        
    }

    /**
     * Almacena un nuevo medicamento.
     * Crea el perfil en caso de no existir.
     * los datos que nos llegan son:
     * PERFIL       : { nombre , clasificacion }
     * MEDICAMENTO  : { cant_blister , codigo , descripcion }
     * ambos del tipo objeto(json)
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response NuevoMedicamentoRequest
     */
    public function store(Request $request){

        try {
            $nombre         = $request->input('nombre');
            $clasificacion  = $request->input('clasificacion');
            $descripcion    = $request->input('descripcion');
            $codigo         = $request->input('codigo');
            $cant_blister   = $request->input('cant_blister');


            $perfil = PerfilMedicamento::where('nombre' , 'like' , '%' . $nombre . '%')
                        ->orWhere( 'clasificacion' , 'like' , '%' . $clasificacion . '%')
                        ->first();
            
            if (!$perfil) {
                $perfil = new PerfilMedicamento();
                $perfil->crear( $nombre , $clasificacion);
            }
            
            $nuevoMedicamento   = new Medicamento();
            $nuevoMedicamento->crear( $perfil , $descripcion , $codigo , $cant_blister );
            $nuevoMedicamento->perfil;
            return response()->json([   'success'           => true ,
                                        'mensaje'           => 'Medicamento creado con exito.',    
                                        'medicamento'       => $nuevoMedicamento,]);
        } catch (\Exception $e) {
           return $e->getMessage();     
        }
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
