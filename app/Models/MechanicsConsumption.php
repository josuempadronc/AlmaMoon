<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

/**
 * Class MechanicsConsumption
 *
 * @property $id
 * @property $date
 * @property $typeMovement_id
 * @property $order
 * @property $rawMaterial_id
 * @property $amountRoll
 * @property $amountMts
 * @property $Product
 * @property $amountProduct
 * @property $TypeProduct
 * @property $location_id
 * @property $observation
 * @property $created_at
 * @property $updated_at
 *
 * @property Location $location
 * @property SewingRawMaterial $sewingRawMaterial
 * @property TypeMovement $typeMovement
 * @package App
 * @mixin \Illuminate\Database\Eloquent\Builder
 */
class MechanicsConsumption extends Model
{
    
    static $rules = [
		'date' => 'required',
		'typeMovement_id' => 'required',
		'order' => 'required',
		'rawMaterial_id' => 'required',
		'amountRoll' => 'required',
		'amountMts' => 'required',
		'Product' => 'required',
		'amountProduct' => 'required',
		'TypeProduct' => 'required',
		'location_id' => 'required',
		'observation' => 'required',
    ];

    protected $perPage = 20;

    /**
     * Attributes that should be mass-assignable.
     *
     * @var array
     */
    protected $fillable = ['date','typeMovement_id','order','rawMaterial_id','amountRoll','amountMts','Product','amountProduct','TypeProduct','location_id','observation'];


    /**
     * @return \Illuminate\Database\Eloquent\Relations\HasOne
     */
    public function location()
    {
        return $this->hasOne('App\Models\Location', 'id', 'location_id');
    }
    
    /**
     * @return \Illuminate\Database\Eloquent\Relations\HasOne
     */
    public function sewingRawMaterial()
    {
        return $this->hasOne('App\Models\SewingRawMaterial', 'id', 'rawMaterial_id');
    }
    
    /**
     * @return \Illuminate\Database\Eloquent\Relations\HasOne
     */
    public function typeMovement()
    {
        return $this->hasOne('App\Models\TypeMovement', 'id', 'typeMovement_id');
    }
    

}
