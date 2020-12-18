<?php

namespace App\Contracts\Repositories;

interface CartRepositoryInterface 
{
    public function get_shopping_cart($user_id);
}