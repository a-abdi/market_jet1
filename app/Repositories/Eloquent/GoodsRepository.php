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
}