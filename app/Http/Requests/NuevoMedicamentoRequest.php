<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class NuevoMedicamentoRequest extends FormRequest
{
    //protected $redirectRoute = 'inicio';

    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize()
    {
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules()
    {
        return [
            'perfil_medicamento_id' => 'required',
            'codigo'                => 'required|unique:medicamentos',
            'cant_blister'          => 'required', 
        ];
    }


    public function messages()
    {
        return [
            'perfil_medicamento_id.required'    => 'El :attribute es obligatorio.',
            'codigo.required'                   => 'Añade un :attribute al producto',
            'codigo.unique'                     => 'Ya existe el :attribute',    
            'cant_blister.required'             => 'La :attribute debe ser mínimo 1',
        ];
    }

    public function attributes(){
        return [
            'perfil_medicamento_id' => 'perfil de medicamento',
            'cant_blister'          => 'cantidad por blister',   
        ];
    }

    /*public function response(array $errors)
    {
        if ($this->expectsJson()) {
            return new JsonResponse($errors, 422);
        }
 
        return $this->redirector->to($this->getRedirectUrl())
            ->withInput($this->except($this->dontFlash))
            ->withErrors($errors, $this->errorBag);
    }*/

    
}
