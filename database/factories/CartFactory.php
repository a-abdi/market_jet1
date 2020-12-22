<?php

namespace Database\Factories;

use App\Models\cart;
use Illuminate\Database\Eloquent\Factories\Factory;

class CartFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = cart::class;

    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        $cart_status = array (
            'previous_cart',
            'previous_cart',
            'previous_cart',
            'cart',            
            'cart',
            'next_cart',
        );
        return [
            'user_id' => rand(1, 100),
            'good_id' => rand(1, 500),
            'cart_status' => $cart_status[array_rand($cart_status)],
        ];
    }
}
