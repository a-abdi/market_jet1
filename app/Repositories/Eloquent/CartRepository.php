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

    public function get_cart($user_id, $cart_status) 
    {
        return  Goods::whereIn('id', 
                    Cart::select('good_id')
                        ->where('user_id', $user_id)
                        ->where('cart_status', $cart_status)
                    ->get())
                ->get();
    }

    public function order($user_id, $current_status, $next_status) 
    {
        return Cart::where('user_id', $user_id)
                ->where('cart_status', $current_status)
                ->update(['cart_status'=> $next_status]);
    }

    public function change_status($user_id, $good_id, $current_status, $next_status) 
    {
        return Cart::where('user_id', $user_id)
                ->where('good_id', $good_id)
                ->where('cart_status', $current_status)
                ->update(['cart_status'=> $next_status]);
    }

}