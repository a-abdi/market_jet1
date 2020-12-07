<?php

namespace Database\Factories;

use App\Models\Goods;
use App\Models\User;
use App\Models\Category;
use Illuminate\Support\Str;
use Illuminate\Database\Eloquent\Factories\Factory;

class GoodsFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = Goods::class;

    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            'image_src' => '/storage/images/kPNiwIpP6vubXBhzd4i4O4ihGjJT96jQaynqETjD.jpeg',
            'name' => $this->faker->name,
            'price' => rand(110,1000),
            'discount' => rand(0,100),
            'goods_code' => Str::random(8),
            'category_id' => Category::factory(),
            'user_id' => rand(1,100),
        ];
    }
}
