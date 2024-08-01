<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

/**
 * Class InyecionOrderPRoduction
 *
 * @property $id
 * @property $date
 * @property $order
 * @property $finishedProduct_id
 * @property $color_id
 * @property $paw_id
 * @property $amount
 * @property $amountToManofacture
 * @property $amountManofacture
 * @property $observation
 * @property $created_at
 * @property $updated_at
 *
 * @property Color $color
 * @property FinishedProduct $finishedProduct
 * @property Paw $paw
 * @package App
 * @mixin \Illuminate\Database\Eloquent\Builder
 */
class InyecionOrderPRoduction extends Model
{
    
    static $rules = [
		'date' => 'required',
		'order' => 'required',
		'finishedProduct_id' => 'required',
		'color_id' => 'required',
		'paw_id' => 'required',
		'amount' => 'required',
		'amountToManofacture' => 'required',
		'amountManofacture' => 'required',
		'observation' => 'required',
    ];

    protected $perPage = 20;

    /**
     * Attributes that should be mass-assignable.
     *
     * @var array
     */
    protected $fillable = ['date','order','finishedProduct_id','color_id','paw_id','amount','amountToManofacture','amountManofacture','observation'];


    /**
     * @return \Illuminate\Database\Eloquent\Relations\HasOne
     */
    public function color()
    {
        return $this->hasOne('App\Models\Color', 'id', 'color_id');
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
    public function paw()
    {
        return $this->hasOne('App\Models\Paw', 'id', 'paw_id');
    }
    

}
