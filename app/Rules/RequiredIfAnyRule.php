<?php

namespace App\Rules;

use Closure;
use Illuminate\Contracts\Validation\Rule;

class RequiredIfAnyRule implements Rule
{
    public function passes($attribute, $value)
    {
        return request()->hasAny(['old_password', 'new_password', 'new_password_confirmation']);
    }

    public function message()
    {
        return 'The field is required if any of the specified fields are filled.';
    }

    public function validate($attribute, $value, $parameters, $validator)
    {
        // Define your custom validation logic here
        return $value; // Example: Return true if the validation passes, false otherwise
    }
}
