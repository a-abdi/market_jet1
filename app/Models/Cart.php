<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Cart extends Model
{
    use HasFactory;
    
    protected $fillable = [
        'user_id',
        'good_id',
        'cart_status',
    ];

    public function user() 
    {
        return $this->belongsTo('App\Models\User');
    }

    public function goods()
    {
        return $this->hasMany('App\Models\Goods');
    }

}
