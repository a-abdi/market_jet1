<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Goods extends Model
{
    use HasFactory;

    public function user()
    {
        return $this->belongsTo('App\Models\User');
    }

    public function category()
    {
        return $this->belongsTo('App\Models\category');
    }

    public function cart()
    {
        return $this->belongsTo('App\Models\cart');
    }


    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name',
        'price',
        'user_id',
        'discount',
        'image_src',
        'goods_code',
        'category_id',
    ];

    protected $hidden = [
        'user_id',
    ];
}
