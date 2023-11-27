<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

/**
 * Class OrderFinishedProduct
 *
 * @property $id
 * @property $order_id
 * @property $finished_product_id
 * @property $created_at
 * @property $updated_at
 *
 * @property FinishedProduct $finishedProduct
 * @property Order $order
 * @package App
 * @mixin \Illuminate\Database\Eloquent\Builder
 */
class OrderFinishedProduct extends Model
{

    static $rules = [
		'order_id' => 'required',
		'finished_product_id' => 'required',
        'color' => 'required'
    ];

    protected $perPage = 20;

    /**
     * Attributes that should be mass-assignable.
     *
     * @var array
     */
    protected $fillable = ['order_id','finished_product_id', 'color'];


    /**
     * @return \Illuminate\Database\Eloquent\Relations\HasOne
     */
    public function finishedProduct()
    {
        return $this->hasOne('App\Models\FinishedProduct', 'id', 'finished_product_id');
    }

    /**
     * @return \Illuminate\Database\Eloquent\Relations\HasOne
     */
    public function order()
    {
        return $this->hasOne('App\Models\Order', 'id', 'order_id');
    }


}
