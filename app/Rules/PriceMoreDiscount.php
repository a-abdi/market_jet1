<?php

namespace App\Rules;

use Illuminate\Contracts\Validation\Rule;

class PriceMoreDiscount implements Rule
{
    protected $discount;
    /**
     * Create a new rule instance.
     *
     * @return void
     */
    public function __construct($discount)
    {
        $this->discount = $discount;
    }

    /**
     * Determine if the validation rule passes.
     *
     * @param  string  $attribute
     * @param  mixed  $value
     * @return bool
     */
    public function passes($attribute, $price)
    {
        return $price >= $this->discount;
    }

    /**
     * Get the validation error message.
     *
     * @return string
     */
    public function message()
    {
        return 'The price is more than a discount.';
    }
}
