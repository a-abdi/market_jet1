<?php

namespace App\Http\Controllers;

use App\Models\Goods;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Inertia\Inertia;
use Illuminate\Support\Str;
use App\Contracts\Repositories\GoodsRepositoryInterface;
use App\Contracts\Repositories\CategoryRepositoryInterface;
use Illuminate\Support\Facades\Storage;

class GoodsController extends Controller
{
    protected $goods;
    protected $category;

    public function __construct(GoodsRepositoryInterface $goods, CategoryRepositoryInterface $category)
    {
        $this->goods = $goods;
        $this->category = $category;
    }


    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Goods  $goods
     * @return \Illuminate\Http\Response
     */
    public function show(Goods $goods, $good_id)
    {
        $good = $this->goods->find($good_id);
        return Inertia::render('Goods/Show/Index', ['good' => $good]);
        // return Inertia::render('Goods/Create/Index', ['categories' => $data]);

    }

}