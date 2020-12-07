<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Inertia\Inertia;
use App\Models\Goods;
use Illuminate\Support\Facades\DB;
use App\Contracts\Repositories\GoodsRepositoryInterface;
use App\Contracts\Repositories\CategoryRepositoryInterface;

class HomeController extends Controller
{
    protected $goods;
    protected $category;

    public function __construct(GoodsRepositoryInterface $goods, CategoryRepositoryInterface $category)
    {
        $this->goods = $goods;
        $this->category = $category;
    }

    public function index(Request $request)
    {
        $all_goods = [];
        foreach ($this->category->all() as $category) {
            $goods ['category_name'] = $category->name;
            $goods ['category']      = DB::table('goods')->where('category_id', $category->id)->orderBy('discount', 'desc')->get();
            array_push($all_goods, $goods);
        }
        // dd($all_goods);
        return Inertia::render('Home', ['all_goods'=> $all_goods]);
    }
}
