<?php

namespace App\Observers;
use Illuminate\Support\Facades\Validator;
use App\Models\User;

class UserNameObserver
{
    
   

    public function updated(User $user)
    {
         // Verificar si se está modificando el nombre de usuario
         if ($user->state == 'activo' && $user->isDirty('name')) {
      
            $originalName = $user->getOriginal('name');
            $newName = $user->getAttribute('name');

            if (User::isDrasticChange($originalName, $newName)) {
                $errorMessage = "No se permite cambiar drásticamente el nombre de usuario.";
                $validator = Validator::make([], []);
                $validator->errors()->add('name', $errorMessage);
                throw new \Illuminate\Validation\ValidationException($validator);
            }
        }
    }



 




    
    public function deleted(User $user)
    {
        //
    }

    /**
     * Handle the user "restored" event.
     *
     * @param  \App\Models\User  $user
     * @return void
     */
    public function restored(User $user)
    {
        //
    }

    /**
     * Handle the user "force deleted" event.
     *
     * @param  \App\Models\User  $user
     * @return void
     */
    public function forceDeleted(User $user)
    {
        //
    }
}
