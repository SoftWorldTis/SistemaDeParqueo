<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use App\Models\User;
use Illuminate\Support\Carbon;
class UsuarioRequest extends FormRequest
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
            'name' => 'required|regex:/^[\pL\s\-]+$/u|min:10|max:40',
            'ci' => 'required|numeric|min:100000|max:9999999999',
            'email' => 'required|email|min:10|max:40',
            'fechanacimiento' => 'required|date|before:' . Carbon::now()->subYears(18)->format('Y-m-d'),
            'password' => 'required|min:8|confirmed',
            'password_confirmation' => 'required|same:password',
            'roles'=> 'required',
        ];
    }

    public function messages()
    {
        return[
            'name.regex' => 'El campo solo admite carácteres alfabéticos',
            'name.min' => 'El campo admite mínimo 10 carácteres',
            'name.max' => 'El campo admite máximo 40 carácteres',
            'ci.numeric' => 'El campo CI solo admite números',
            'ci.max' => 'El campo CI admite máximo 10 dígitos',
            'ci.min' => 'El campo CI admite minímo 6 dígitos',
            'fechanacimiento.before' => 'Debes ser mayor de 18 años',
            'fechanacimiento.' => 'La Fecha de Nacimiento debe ser una fecha',
            'email.email' => 'Ingresar un correo valido',
            'email.max' => 'El campo Correo admite máximo 40 carácteres',
            'email.min' => 'El campo Correo admite máximo 10 carácteres',

            'password.min' => 'La contraseña debe tener minímo 8 carácteres',
            'rol.required' => 'Es campo Roles es obligatorio',
        ];
    }
}
