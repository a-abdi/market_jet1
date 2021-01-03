<?php

namespace App\Repositories\Eloquent;

use App\Models\Goods;
use App\Repositories\Eloquent\BaseRepository;
use App\Contracts\Repositories\GoodsRepositoryInterface;

class GoodsRepository extends BaseRepository implements GoodsRepositoryInterface
{
    protected $model;

    public function __construct(Goods $model) 
    {
        $this->model = $model;
        parent::__construct($model);
    }

    public function get_goods_bye_offset_limit($offset, $limit) 
    {
        return $this->model->with('category')->offset($offset)->limit($limit)->get();
    }

    public function get_good($relationsi, $good_id) 
    {
        return Goods::with($relationsi)->where('id', $good_id)->get();
    }
    
}