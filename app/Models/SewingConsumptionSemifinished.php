<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

/**
 * Class SewingConsumptionSemifinished
 *
 * @property $id
 * @property $date
 * @property $typeMovement_id
 * @property $SemifinishedProduct_id
 * @property $amount
 * @property $Product
 * @property $amountPro
 * @property $color_id
 * @property $observation
 * @property $created_at
 * @property $updated_at
 *
 * @property Color $color
 * @property SemiFinishedProduct $semiFinishedProduct
 * @property TypeMovement $typeMovement
 * @package App
 * @mixin \Illuminate\Database\Eloquent\Builder
 */
class SewingConsumptionSemifinished extends Model
{
    
    static $rules = [
		'date' => 'required',
		'typeMovement_id' => 'required',
		'SemifinishedProduct_id' => 'required',
		'amount' => 'required',
		'Product' => 'required',
		'amountPro' => 'required',
		'color_id' => 'required',
		'observation' => 'required',
    ];

    protected $perPage = 20;

    /**
     * Attributes that should be mass-assignable.
     *
     * @var array
     */
    protected $fillable = ['date','typeMovement_id','SemifinishedProduct_id','amount','Product','amountPro','color_id','observation'];


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
    public function semiFinishedProduct()
    {
        return $this->hasOne('App\Models\SemiFinishedProduct', 'id', 'SemifinishedProduct_id');
    }
    
    /**
     * @return \Illuminate\Database\Eloquent\Relations\HasOne
     */
    public function typeMovement()
    {
        return $this->hasOne('App\Models\TypeMovement', 'id', 'typeMovement_id');
    }
    

}
