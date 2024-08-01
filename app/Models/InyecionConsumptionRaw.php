<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

/**
 * Class InyecionConsumptionRaw
 *
 * @property $id
 * @property $date
 * @property $typeMovement_id
 * @property $order
 * @property $orderProduction
 * @property $Maquina
 * @property $finishedProduct_id
 * @property $rawMaterial_id
 * @property $amount
 * @property $destination_id
 * @property $observation
 * @property $created_at
 * @property $updated_at
 *
 * @property InyecionRawMaterial $inyecionRawMaterial
 * @property Destination $destination
 * @property FinishedProduct $finishedProduct
 * @property TypeMovement $typeMovement
 * @package App
 * @mixin \Illuminate\Database\Eloquent\Builder
 */
class InyecionConsumptionRaw extends Model
{
    
    static $rules = [
		'date' => 'required',
		'typeMovement_id' => 'required',
		'order' => 'required',
		'orderProduction' => 'required',
		'Maquina' => 'required',
		'finishedProduct_id' => 'required',
		'rawMaterial_id' => 'required',
		'amount' => 'required',
		'destination_id' => 'required',
		'observation' => 'required',
    ];

    protected $perPage = 20;

    /**
     * Attributes that should be mass-assignable.
     *
     * @var array
     */
    protected $fillable = ['date','typeMovement_id','order','orderProduction','Maquina','finishedProduct_id','rawMaterial_id','amount','destination_id','observation'];


    /**
     * @return \Illuminate\Database\Eloquent\Relations\HasOne
     */
    public function inyecionRawMaterial()
    {
        return $this->hasOne('App\Models\InyecionRawMaterial', 'id', 'rawMaterial_id');
    }
    
    /**
     * @return \Illuminate\Database\Eloquent\Relations\HasOne
     */
    public function destination()
    {
        return $this->hasOne('App\Models\Destination', 'id', 'destination_id');
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
    public function typeMovement()
    {
        return $this->hasOne('App\Models\TypeMovement', 'id', 'typeMovement_id');
    }
    

}
