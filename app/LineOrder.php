<?php

namespace App;

use Illuminate\Database\Eloquent\Model;


class LineOrder extends Model
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
    public function product()
    {
        return $this->belongsTo(Product::class,'product_id');

    }
    public function order()
    {
        return $this->belongsTo(Order::class,'order_id');

    }


    protected $table = 'line_orders';

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */


}