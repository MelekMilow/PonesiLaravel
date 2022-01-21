<?php

namespace App\Rules;

use App\Models\Hrana;
use Illuminate\Contracts\Validation\Rule;

class PostojiHrana implements Rule
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
        $hrana=Hrana::find($value);
        return $hrana!=null;
    }

    /**
     * Get the validation error message.
     *
     * @return string
     */
    public function message()
    {
        return 'Hrana ne postoji!';
    }
}
