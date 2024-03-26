<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

/**
 * Class Order
 *
 * @property $id
 * @property $name
 * @property $rif
 * @property $destination_id
 * @property $movementDeatil_id
 * @property $finishedProduct_id
 * @property $assembledProduct_id
 * @property $amount
 * @property $status
 * @property $created_at
 * @property $updated_at
 *
 * @property AssembledProduct $assembledProduct
 * @property Destination $destination
 * @property FinishedProduct $finishedProduct
 * @property MovementDetail $movementDetail
 * @package App
 * @mixin \Illuminate\Database\Eloquent\Builder
 */
class Order extends Model
{

    static $rules = [
        // 'name' => 'required',
        // 'rif' => 'required',
        // 'destination_id' => 'required',
        // 'movementDeatil_id' => 'required',
        'status' => 'required',
    ];

    protected $perPage = 20;

    /**
     * Attributes that should be mass-assignable.
     *
     * @var array
     */
    protected $fillable = ['name_id', 'rif', 'destination', 'movementDeatil_id', 'finishedProduct_id', 'assembledProduct_id', 'customer_id', 'amount', 'status'];


    /**
     * @return \Illuminate\Database\Eloquent\Relations\HasOne
     */
    public function assembledProduct()
    {
        return $this->hasOne('App\Models\AssembledProduct', 'id', 'assembledProduct_id');
    }


    /**
     * @return \Illuminate\Database\Eloquent\Relations\HasOne
     */
    public function finishedProduct()
    {
        return $this->hasOne('App\Models\FinishedProduct', 'id', 'finishedProduct_id');
    }

    /**
     * @return \Illuminate\Database\Eloquent\Relations\HasOne
     */
    public function Customer()
    {
        return $this->hasOne('App\Models\Customer', 'id', 'name_id');
    }

    /**
     * @return \Illuminate\Database\Eloquent\Relations\HasOne
     */
    public function movementDetail()
    {
        return $this->hasOne('App\Models\MovementDetail', 'id', 'movementDeatil_id');
    }

    /**
     * @return \Illuminate\Database\Eloquent\Relations\belongsToMany
     */
    public function finishedProducts()
    {
        return $this->belongsToMany(
            FinishedProduct::class,
            'order_finished_product',
            'order_id',
            'finished_product_id'
        )->withPivot('amount', 'color_id');
    }
}
