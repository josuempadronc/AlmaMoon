<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

/**
 * Class SewingConsumption
 *
 * @property $id
 * @property $date
 * @property $typeMovement_id
 * @property $rawMaterial_id
 * @property $amountRoll
 * @property $amountMts
 * @property $Product
 * @property $amountProduct
 * @property $color_id
 * @property $TypeProduct
 * @property $observation
 * @property $created_at
 * @property $updated_at
 *
 * @property Color $color
 * @property SewingRawMaterial $sewingRawMaterial
 * @property TypeMovement $typeMovement
 * @package App
 * @mixin \Illuminate\Database\Eloquent\Builder
 */
class SewingConsumption extends Model
{
    
    static $rules = [
		'date' => 'required',
		'typeMovement_id' => 'required',
		'rawMaterial_id' => 'required',
		'amountRoll' => 'required',
		'amountMts' => 'required',
		'Product' => 'required',
		'amountProduct' => 'required',
		'color_id' => 'required',
		'TypeProduct' => 'required',
		'observation' => 'required',
    ];

    protected $perPage = 20;

    /**
     * Attributes that should be mass-assignable.
     *
     * @var array
     */
    protected $fillable = ['date','typeMovement_id','rawMaterial_id','amountRoll','amountMts','Product','amountProduct','color_id','TypeProduct','observation'];


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
