<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

/**
 * Class WindmillConsumption
 *
 * @property $id
 * @property $date
 * @property $typeMovement_id
 * @property $Product
 * @property $amount
 * @property $measures_id
 * @property $finishedProduct_id
 * @property $type
 * @property $observation
 * @property $created_at
 * @property $updated_at
 *
 * @property FinishedProduct $finishedProduct
 * @property Measure $measure
 * @property TypeMovement $typeMovement
 * @package App
 * @mixin \Illuminate\Database\Eloquent\Builder
 */
class WindmillConsumption extends Model
{
    
    static $rules = [
		'date' => 'required',
		'typeMovement_id' => 'required',
		'Product' => 'required',
		'amount' => 'required',
		'measures_id' => 'required',
		'finishedProduct_id' => 'required',
		'type' => 'required',
		'observation' => 'required',
    ];

    protected $perPage = 20;

    /**
     * Attributes that should be mass-assignable.
     *
     * @var array
     */
    protected $fillable = ['date','typeMovement_id','Product','amount','measures_id','finishedProduct_id','type','observation'];


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
    public function measure()
    {
        return $this->hasOne('App\Models\Measure', 'id', 'measures_id');
    }
    
    /**
     * @return \Illuminate\Database\Eloquent\Relations\HasOne
     */
    public function typeMovement()
    {
        return $this->hasOne('App\Models\TypeMovement', 'id', 'typeMovement_id');
    }
    

}
