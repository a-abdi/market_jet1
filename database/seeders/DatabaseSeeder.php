<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Database\Eloquent\Factories\Sequence;
use App\Models\Category;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        \App\Models\User::factory(100)->create();

        \App\Models\Goods::factory()->state(
            new Sequence(
                ['image_src' =>'/storage/images/kPNiwIpP6vubXBhzd4i4O4ihGjJT96jQaynqETjD.jpeg'],
                ['image_src' =>'/storage/images/cFsdQNebhUh3PafjjlPloRnZ1rmjtxkHa0XYXNHS.jpeg'],
                ['image_src' =>'/storage/images/w5dURC1hb1iONPBfDMB821sqmyQAUT0UKgfHhTeJ.jpeg'],
                ['image_src' =>'/storage/images/j5fTEQG4Ug5my1TwACUwufbJIizM1RZS0ZFJ83IC.jpeg'],
                ))
            ->count(100)
            ->for(\App\Models\Category::factory()->state([
            'name' => 'Books',
        ]))
        ->create();

        \App\Models\Goods::factory()->state(
            new Sequence(
                ['image_src' =>'/storage/images/2tIk39JAEh5vgfU4AS0PoayxSxnDVCQF4Wh6lwgF.jpeg'],
                ['image_src' =>'/storage/images/bifIbrdrwvsgc6yc8Q3ro23XaQB0t1h6nUT9G6l0.jpeg'],
                ['image_src' =>'/storage/images/G7RLBzZThh3XV7CUYDBNqNl3kpyB9lkAJIBlxmmD.jpeg'],
                ['image_src' =>'/storage/images/lle8qN4nJTUDRL94HI5gnO65So9QNBNr9JhGNMZg.jpeg'],
                ['image_src' =>'/storage/images/yv3erAlo33JF0YFsAOpmiJ8NcdVITCCbWKEhKvaN.jpeg'],
                ))
            ->count(100)
            ->for(\App\Models\Category::factory()->state([
            'name' => 'Digital',
        ]))
        ->create();

        \App\Models\Goods::factory()->state(
            new Sequence(
                ['image_src' =>'/storage/images/9GLJhi7Y6iF71UXDOY2W2Yf5VifoLnOufDn8Asyx.jpeg'],
                ['image_src' =>'/storage/images/iEiRongcDaDt28u1haFjR9AZriaBshxE2k6cLxhK.jpeg'],
                ['image_src' =>'/storage/images/WM3LOdktusbsGLgQ1r3mByeqfGqkVst6Rrziy9by.jpeg'],
                ['image_src' =>'/storage/images/wCxqYgAvUIzUvaRPjbMCk6zzkgv6USBTUKV11cWl.jpeg'],
                ))
            ->count(100)
            ->for(\App\Models\Category::factory()->state([
            'name' => 'Clothing',
        ]))
        ->create();

        \App\Models\Goods::factory()->state(
            new Sequence(
                ['image_src' =>'/storage/images/gMcACMf4lYJFBlgpwnPpRw6AJywsvopTTiI0rHKB.jpeg'],
                ))
            ->count(100)
            ->for(\App\Models\Category::factory()->state([
            'name' => 'Toy',
        ]))
        ->create();

        \App\Models\Goods::factory()->state(
            new Sequence(
                ['image_src' =>'/storage/images/SIoeIz426j49DKYMOtm450SY2C3qJo7V4IcRFF52.jpeg'],
                ['image_src' =>'/storage/images/qHRFagoQs9WsNIERa4UigNc0V0yaFCcqI1a3q0tP.jpeg'],
                ))
            ->count(100)
            ->for(\App\Models\Category::factory()->state([
            'name' => 'Home Appliances',
        ]))
        ->create();

        \App\Models\Cart::factory(2000)->create();

    }
}
