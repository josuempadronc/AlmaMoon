<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

/**
 * Class FinishedProduct
 *
 * @property $id
 * @property $color_id
 * @property $paw_id
 * @property $name
 * @property $created_at
 * @property $updated_at
 *
 * @property Color $color
 * @property Movement[] $movements
 * @property Paw $paw
 * @package App
 * @mixin \Illuminate\Database\Eloquent\Builder
 */
class FinishedProduct extends Model
{

    static $rules = [
        'color_id' => 'required',
        'paw_id' => 'required',
        'name' => 'required',
        'stock' => 'required',
    ];

    protected $perPage = 20;

    /**
     * Attributes that should be mass-assignable.
     *
     * @var array
     */
    protected $fillable = ['color_id', 'paw_id', 'name', 'stock'];


    /**
     * @return \Illuminate\Database\Eloquent\Relations\HasOne
     */
    public function color()
    {
        return $this->belongsTo('App\Models\Color', 'color_id');
    }

    /**
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function movements()
    {
        return $this->hasMany('App\Models\Movement', 'finishedProduct_id', 'id');
    }

    /**
     * @return \Illuminate\Database\Eloquent\Relations\HasOne
     */
    public function paw()
    {
        return $this->belongsTo('App\Models\Paw', 'paw_id');
    }
    public function orders()
    {
        return $this->belongsToMany('App\Models\Order', 'order_finished_product', 'finished_product_id', 'order_id');
    }
    public function colors()
{
    return $this->belongsToMany('App\Models\Color', 'order_finished_product', 'finished_product_id', 'order_id')
        ->withPivot('amount', 'color');
}
}
