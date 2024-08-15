<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

/**
 * Class MechanicsConsumptionSemifinished
 *
 * @property $id
 * @property $date
 * @property $typeMovement_id
 * @property $semiFinished_id
 * @property $amountRoll
 * @property $product_id
 * @property $amountProduct
 * @property $observation
 * @property $created_at
 * @property $updated_at
 *
 * @property MechanicsProduct $mechanicsProduct
 * @property MechanicsSemifinished $mechanicsSemifinished
 * @property TypeMovement $typeMovement
 * @package App
 * @mixin \Illuminate\Database\Eloquent\Builder
 */
class MechanicsConsumptionSemifinished extends Model
{
    
    static $rules = [
		'date' => 'required',
		'typeMovement_id' => 'required',
		'semiFinished_id' => 'required',
		'amountRoll' => 'required',
		'product_id' => 'required',
		'amountProduct' => 'required',
		'observation' => 'required',
    ];

    protected $perPage = 20;

    /**
     * Attributes that should be mass-assignable.
     *
     * @var array
     */
    protected $fillable = ['date','typeMovement_id','semiFinished_id','amountRoll','product_id','amountProduct','observation'];


    /**
     * @return \Illuminate\Database\Eloquent\Relations\HasOne
     */
    public function mechanicsProduct()
    {
        return $this->hasOne('App\Models\MechanicsProduct', 'id', 'product_id');
    }
    
    /**
     * @return \Illuminate\Database\Eloquent\Relations\HasOne
     */
    public function mechanicsSemifinished()
    {
        return $this->hasOne('App\Models\MechanicsSemifinished', 'id', 'semiFinished_id');
    }
    
    /**
     * @return \Illuminate\Database\Eloquent\Relations\HasOne
     */
    public function typeMovement()
    {
        return $this->hasOne('App\Models\TypeMovement', 'id', 'typeMovement_id');
    }
    

}
