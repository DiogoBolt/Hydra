<?php

namespace App;

use Illuminate\Database\Eloquent\Model;


class PromotionProduct extends Model
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
    public function promotion()
    {
        return $this->belongsTo(Promotion::class,'promotion_id');
    }

    protected $table = 'promotions_products';

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */


}