<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

/**
 * Class InyecionConsumptionSemiFinished
 *
 * @property $id
 * @property $date
 * @property $typeMovement_id
 * @property $finishedProduct_id
 * @property $color_id
 * @property $amount
 * @property $productDelivered
 * @property $paw_id
 * @property $destination_id
 * @property $amountPaw
 * @property $typeProduct
 * @property $location_id
 * @property $observation
 * @property $created_at
 * @property $updated_at
 *
 * @property Color $color
 * @property FinishedProduct $finishedProduct
 * @property Location $location
 * @property Paw $paw
 * @property TypeMovement $typeMovement
 * @package App
 * @mixin \Illuminate\Database\Eloquent\Builder
 */
class InyecionConsumptionSemiFinished extends Model
{
    
    static $rules = [
		'date' => 'required',
		'typeMovement_id' => 'required',
		'finishedProduct_id' => 'required',
		'color_id' => 'required',
		'amount' => 'required',
		'productDelivered' => 'required',
		'paw_id' => 'required',
		'destination_id' => 'required',
		'amountPaw' => 'required',
		'typeProduct' => 'required',
		'location_id' => 'required',
		'observation' => 'required',
    ];

    protected $perPage = 20;

    /**
     * Attributes that should be mass-assignable.
     *
     * @var array
     */
    protected $fillable = ['date','typeMovement_id','finishedProduct_id','color_id','amount','productDelivered','paw_id','destination_id','amountPaw','typeProduct','location_id','observation'];


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
    public function location()
    {
        return $this->hasOne('App\Models\Location', 'id', 'location_id');
    }
    
    /**
     * @return \Illuminate\Database\Eloquent\Relations\HasOne
     */
    public function paw()
    {
        return $this->hasOne('App\Models\Paw', 'id', 'paw_id');
    }
    
    /**
     * @return \Illuminate\Database\Eloquent\Relations\HasOne
     */
    public function typeMovement()
    {
        return $this->hasOne('App\Models\TypeMovement', 'id', 'typeMovement_id');
    }
    

}
