<?php

namespace App\Rules;

use Illuminate\Contracts\Validation\Rule;
use App\Models\vehiculo;
use App\Models\User;

class MaxVehiculos implements Rule
{
    /**
     * Create a new rule instance.
     *
     * @return void
     */
    public function __construct()
    {
        //
    }

    /**
     * Determine if the validation rule passes.
     *
     * @param  string  $attribute
     * @param  mixed  $value
     * @return bool
     */
    public function passes($attribute, $value)
    {
        $usuario= User::where('ci', $value)->first();
        if($usuario){
            $vehiculosCount = vehiculo::where('userid', $usuario->id)->count();
            //dd($vehiculosCount);
            return $vehiculosCount < 3;
        }
        
    }

    /**
     * Get the validation error message.
     *
     * @return string
     */
    public function message()
    {
        return 'No es posible registrar mas de 3 vehículos.';
    }
}
