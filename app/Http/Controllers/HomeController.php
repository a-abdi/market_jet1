<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Inertia\Inertia;
use App\Models\Goods;
use App\Models\Category;
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
        $categories = [];
        $category_list_show = ['Books','Digital', 'Clothing', 'Books'];

        $category_list_object = Category::whereIn('name', $category_list_show)->get();
        
        foreach ($category_list_show as $category_show) {
            foreach($category_list_object as $category_object) {
                if($category_show == $category_object->name) {
                    $category ['name'] = $category_show;
                    $category ['goods'] = Goods::where('category_id', $category_object->id)->orderBy('discount', 'desc')->take(16)->get();
                    break;
                }
            }
            array_push($categories, $category);
        }

        return Inertia::render('Home', ['categories'=> $categories]);
    }
}
