<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use App\Rules\superior;
use App\Rules\telefono;
use App\Models\estacionamiento;

class ParqueoRequest extends FormRequest
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
            'estacionamientozona'=> ['required','min:3','max:25','unique:App\Models\estacionamiento,estacionamientozona', new superior],
            'estacionamientocorreo'=> ['required','email','min:10','max:25', new superior], 
            'estacionamientohoraInicio'=> ['required'],
            'estacionamientohoraCierre'=> ['required', 'after:estacionamientohoraInicio'],
            'estacionamientotelefono' =>  ['required',new telefono ], 
            'estacionamientositios'=>['required','numeric','min:10','max:200'],
            'estacionamientoprecio'=>['required','numeric','min:1','max:200'],
            'estacionamientoimagen' => ['required','mimes:jpeg,png,jpg','max:2048'],
        ];
    }

    public function messages()
    {
        return[
            'estacionamientozona.required' => 'El campo es obligatorio',
            'estacionamientozona.min' => 'Debe contener al menos 3 carácteres',
            'estacionamientozona.max' => 'Este campo no permite más de 25 carácteres',
            'estacionamientozona.unique' => 'El estacionamiento ya fue registrado',
            'estacionamientocorreo.required' => 'El campo es obligatorio',
            'estacionamientocorreo.email' => 'Ingresar un correo válido',
            'estacionamientocorreo.max' => 'El campo admite máximo 25 carácteres',
            'estacionamientocorreo.min' => 'El campo admite minímo 10 carácteres',
            'estacionamientohoraInicio.required' => 'El campo es obligatorio',
            'estacionamientohoraCierre.required' => 'El campo es obligatorio',
            'estacionamientohoraCierre.after' => 'Ingrese un hora de cierre mayor a la hora inicial',
            'estacionamientotelefono.required' => 'El campo es obligatorio',
            'estacionamientositios.required' => 'El campo es obligatorio',
            'estacionamientositios.max' => 'Máximo de 200',
            'estacionamientositios.min' => 'Máximo de 10 requerido',

            'estacionamientoprecio.required' => 'El campo es obligatorio',
            'estacionamientoprecio.max' => 'Máximo de 200',
            'estacionamientoprecio.min' => 'Mínimo de 1 requerido',

            'estacionamientoimagen.required' => 'El campo es obligatorio',
            'estacionamientoimagen.max' => 'Máximo de 2048 MB',
            'estacionamientoimagen.mimes' => 'Ingrese una imagen con formato jpeg,png,jpg',
        ];
    }
}
