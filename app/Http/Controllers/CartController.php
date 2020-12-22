<?php

namespace App\Http\Controllers;

use Inertia\Inertia;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Auth;
use App\Contracts\Repositories\CartRepositoryInterface;

class CartController extends Controller
{
    
    protected $cart;

    public function __construct(CartRepositoryInterface $cart)
    {
        $this->cart = $cart;
    }
    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $user_id = Auth::id();
        $good_id = $request->good_id;
        $cart_status = 'cart';
        $response = $this->cart->create([
            'user_id' => $user_id,
            'good_id' => $good_id,
            'cart_status' => $cart_status
        ]);

        return redirect()->route('goods.show', ['good' => $good_id]);
    }

    public function index() 
    {
        return Inertia::render('Cart/Show/Cart');
    }

    public function change(Request $request)
    {
        $this->cart->change_status(Auth::id(), $request->good_id, $request->current_status, $request->next_status);

        return redirect()->route('cart.index');
    }

    public function order(Request $request)
    {
        $this->cart->order(Auth::id(), $request->current_status, $request->next_status);

        return redirect()->route('cart.index');
    }


    public function next()
    {
        return Inertia::render('Cart/Show/NextCart', 
            [
                'nextCart'=> $this->cart->get_cart(Auth::id(), 'next_cart')
            ]
        );
    }

    public function previous()
    {
        return Inertia::render('Cart/Show/PreviousCart', 
            [
                'previousCart'=> $this->cart->get_cart(Auth::id(), 'previous_cart')
            ]
        );
    }

}
