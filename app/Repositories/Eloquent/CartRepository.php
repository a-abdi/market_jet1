<?php

namespace App\Repositories\Eloquent;

use App\Models\Cart;
use App\Models\Goods;
use Illuminate\Database\Eloquent\Builder;
use App\Repositories\Eloquent\BaseRepository;
use App\Contracts\Repositories\CartRepositoryInterface;

class CartRepository extends BaseRepository implements CartRepositoryInterface
{

    public function __construct(Cart $cart) 
    {
        parent::__construct($cart);
    }

    public function get_shopping_cart($user_id) 
    {
        return Goods::whereIn('id', 
            Cart::select('good_id')
                ->where('user_id', $user_id)
                ->where('cart_status', 'list_cart')
                ->get())
            ->get();
    }

}