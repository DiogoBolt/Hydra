<?php

namespace App;

use Illuminate\Database\Eloquent\Model;


class Order extends Model
{
    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    /**
     * The photo fields should be listed here.
     *
     * @var array
     */
    public function products()
    {
        return $this->hasManyThrough(Product::class,LineOrder::class,'product_id','order_id');

    }


    protected $table = 'orders';

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */


}