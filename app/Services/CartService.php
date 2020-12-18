<?php

namespace App\Repositories\Eloquent;

use App\Contracts\Repositories\CartRepositoryInterface;
use App\Contracts\Repositories\GoodsRepositoryInterface;

class CartService
{
    public function get_shopping_cart(CartRepositoryInterface $cart)
    {
        return $cart->get_list_cart($user_id);
    }
}