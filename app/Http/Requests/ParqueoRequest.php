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
    $rules = [
        'estacionamientozona' => ['required', 'min:3', 'max:25', new superior],
        'estacionamientocorreo' => ['required', 'email', 'min:10', 'max:25', new superior],
        'estacionamientohoraInicio' => ['required'],
        'estacionamientohoraCierre' => ['required', 'after:estacionamientohoraInicio'],
        'estacionamientotelefono' => ['required', new telefono],
        'estacionamientositios' => ['required', 'numeric', 'min:10', 'max:200'],
        'estacionamientoprecio' => ['required', 'numeric', 'min:1', 'max:200'],
    ];

    if ($this->has('parqueo_id')) {
        $modelId = $this->input('parqueo_id');
        $model = estacionamiento::find($modelId);

        if ($model) {
            $rules['estacionamientoimagen'] = ['nullable', 'mimes:jpeg,png,jpg', 'max:2048'];
        } else {
            $rules['estacionamientoimagen'] = ['required', 'mimes:jpeg,png,jpg', 'max:2048'];
        }
    } else {
        $rules['estacionamientoimagen'] = ['required', 'mimes:jpeg,png,jpg', 'max:2048'];
    }

    return $rules;
}
    public function messages()
    {
        return[
            'estacionamientozona.required' => 'El campo es obligatorio',
            'estacionamientozona.min' => 'Debe contener al menos 3 carÃ¡cteres',
            'estacionamientozona.max' => 'Este campo no permite mÃ¡s de 25 carÃ¡cteres',
            'estacionamientocorreo.required' => 'El campo es obligatorio',
            'estacionamientocorreo.email' => 'Ingresar un correo vÃ¡lido',
            'estacionamientocorreo.max' => 'El campo admite mÃ¡ximo 25 carÃ¡cteres',
            'estacionamientocorreo.min' => 'El campo admite minÃ­mo 10 carÃ¡cteres',
            'estacionamientohoraInicio.required' => 'El campo es obligatorio',
            'estacionamientohoraCierre.required' => 'El campo es obligatorio',
            'estacionamientohoraCierre.after' => 'Ingrese un hora de cierre mayor a la hora inicial',
            'estacionamientotelefono.required' => 'El campo es obligatorio',
            'estacionamientositios.required' => 'El campo es obligatorio',
            'estacionamientositios.max' => 'MÃ¡ximo de 200',
            'estacionamientositios.min' => 'MÃ¡ximo de 10 requerido',

            'estacionamientoprecio.required' => 'El campo es obligatorio',
            'estacionamientoprecio.max' => 'MÃ¡ximo de 200',
            'estacionamientoprecio.min' => 'MÃ­nimo de 1 requerido',

            'estacionamientoimagen.required' => 'El campo es obligatorio',
            'estacionamientoimagen.max' => 'MÃ¡ximo de 2048 MB',
            'estacionamientoimagen.mimes' => 'Ingrese una imagen con formato jpeg,png,jpg',
        ];
    }
}
