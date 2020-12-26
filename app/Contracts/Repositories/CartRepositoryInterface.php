<?php

namespace App\Contracts\Repositories;

interface CartRepositoryInterface 
{
    public function get_cart($user_id, $cart_status);

    public function order($user_id, $current_status, $next_status);

    public function change_status($user_id, $good_id, $current_status, $next_status);

    public function cart_destroy($user_id, $good_id);
}