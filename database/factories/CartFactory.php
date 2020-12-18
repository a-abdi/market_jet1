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
            'bought',
            'bought',
            'bought',
            'list_cart',            
            'list_cart',
            'next_list_card',
        );
        return [
            'user_id' => rand(1, 100),
            'good_id' => rand(1, 500),
            'cart_status' => $cart_status[array_rand($cart_status)],
        ];
    }
}
