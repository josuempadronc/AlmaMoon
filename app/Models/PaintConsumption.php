<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

/**
 * Class PaintConsumption
 *
 * @property $id
 * @property $date
 * @property $typeMovement_id
 * @property $order
 * @property $ProductOrMaterial
 * @property $amount
 * @property $measures_id
 * @property $Product
 * @property $amountProduct
 * @property $type
 * @property $observation
 * @property $created_at
 * @property $updated_at
 *
 * @property Measure $measure
 * @property TypeMovement $typeMovement
 * @package App
 * @mixin \Illuminate\Database\Eloquent\Builder
 */
class PaintConsumption extends Model
{
    
    static $rules = [
		'date' => 'required',
		'typeMovement_id' => 'required',
		'order' => 'required',
		'ProductOrMaterial' => 'required',
		'amount' => 'required',
		'measures_id' => 'required',
		'Product' => 'required',
		'amountProduct' => 'required',
		'type' => 'required',
		'observation' => 'required',
    ];

    protected $perPage = 20;

    /**
     * Attributes that should be mass-assignable.
     *
     * @var array
     */
    protected $fillable = ['date','typeMovement_id','order','ProductOrMaterial','amount','measures_id','Product','amountProduct','type','observation'];


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
