<?php

namespace App\Rules;

use Illuminate\Contracts\Validation\Rule;

class UserUnique implements Rule
{
    private $user_id;
    private $user;
    /**
     * Create a new rule instance.
     *
     * @return void
     */
    public function __construct($user_id, $user)
    {
        $this->user_id = $user_id;
        $this->user = $user;
    }

    /**
     * Determine if the validation rule passes.
     *
     * @param  string  $attribute
     * @param  mixed  $value
     * @return bool
     */
    public function passes($attribute, $email)
    {
        // return true;
        // dd($this->user->where('email', $email)->isEmpty())  ;
        return $this->user->where('email', $email)->isEmpty() ||
            $this->user->find($this->user_id)->email == $email; 
    }

    /**
     * Get the validation error message.
     *
     * @return string
     */
    public function message()
    {
        return 'The email has already been taken.';
    }
}
