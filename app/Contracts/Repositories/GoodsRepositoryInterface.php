<?php

namespace App\Contracts\Repositories;

interface GoodsRepositoryInterface 
{
    public function get_goods_bye_offset_limit($offset, $limit);

    public function get_good($relationsi, $good_id);

}