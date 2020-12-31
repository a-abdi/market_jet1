<?php

namespace App\Http\Controllers\Admin;

use App\Models\Goods;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Inertia\Inertia;
use Illuminate\Support\Str;
use App\Http\Controllers\Controller;
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
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create(Request $request)
    {
        // dd('welcome to create admin');
        $data = $this->category->all();
        return Inertia::render('Goods/Create/Index', ['categories' => $data]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $goods_code = Str::random(8);
        $user_id = Auth::id();
        $category_id = ($this->category->search(['id'],'name', $request->category))[0]->id;
        $path = $request->image->store('images', 'public');
        $url = Storage::url($path);

        $goods_object = [
            'name'=> $request->name,
            'category_id'=> $category_id,
            'price'=> $request->price,
            'discount'=> $request->discount,
            'user_id'=> $user_id,
            'image_src'=> $url,
            'goods_code'=> $goods_code,
        ];

        $resulte = $this->goods->create($goods_object);
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

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Goods  $goods
     * @return \Illuminate\Http\Response
     */
    public function edit(Goods $goods)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Goods  $goods
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Goods $goods)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Goods  $goods
     * @return \Illuminate\Http\Response
     */
    public function destroy(Goods $goods)
    {
        //
    }
}