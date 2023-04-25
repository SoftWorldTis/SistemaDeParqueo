<?php

namespace App\Rules;

use Illuminate\Contracts\Validation\Rule;

class hora implements Rule
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
    public function passes($attribute, $value , $attribute2 ,$value2) 
    {
        return $value>$value2;
         
    }

    /**
     * Get the validation error message.
     *
     * @return string
     */
    public function message()
    {
        return 'inserte una hora inicial menor que la de cierre';
    }
}
