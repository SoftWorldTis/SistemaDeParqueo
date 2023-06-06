<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use App\Rules\MaxVehiculos;

class VehiculoRequest extends FormRequest
{
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
            //'ci' => 'required|numeric|min:100000|max:9999999999|exists:users,ci',
            'ci' =>  ['required','numeric','min:100000', 'max:9999999999', 'exists:users,ci', new MaxVehiculos], 
            'clienteV1' => 'required|unique:App\Models\vehiculo,vehiculoplaca',
        ];
    }

    public function messages()
    {
        return[
        
            'ci.required' => 'El campo CI es obligatorio',
            'ci.numeric' => 'El campo CI solo admite números',
            'ci.max' => 'El campo CI admite máximo 10 dígitos',
            'ci.min' => 'El campo CI admite minímo 6 dígitos',
            'ci.exists' => 'No existe ningun usuario con ese CI',
            'clienteV1.required' => 'El campo es obligatorio',
            'clienteV1.unique' => 'El número de placa ya fue resgistrado',
            'vehiculomodelo.required' => 'El campo es obligatorio'
        ];
    }
}
