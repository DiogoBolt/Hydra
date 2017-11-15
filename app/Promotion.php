<?php

namespace App;

use Illuminate\Database\Eloquent\Model;


class Promotion extends Model
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
        return $this->hasMany(PromotionProduct::class,'promotion_id');

    }


    protected $table = 'promotions';

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */


}