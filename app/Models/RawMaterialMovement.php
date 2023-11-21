<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

/**
 * Class RawMaterialMovement
 *
 * @property $id
 * @property $date
 * @property $typeMovement_id
 * @property $order
 * @property $consumption
 * @property $businessName
 * @property $supplier_id
 * @property $rawMaterial
 * @property $amount
 * @property $origin_id
 * @property $destination_id
 * @property $location_id
 * @property $observation
 * @property $created_at
 * @property $updated_at
 *
 * @property Destination $destination
 * @property Location $location
 * @property Origin $origin
 * @property RawMaterial $rawMaterial
 * @property Supplier $supplier
 * @property TypeMovement $typeMovement
 * @package App
 * @mixin \Illuminate\Database\Eloquent\Builder
 */
class RawMaterialMovement extends Model
{
    
    static $rules = [
		'date' => 'required',
		'typeMovement_id' => 'required',
		'order' => 'required',
		'consumption' => 'required',
		'businessName' => 'required',
		'supplier_id' => 'required',
		'rawMaterial' => 'required',
		'amount' => 'required',
		'origin_id' => 'required',
		'destination_id' => 'required',
		'location_id' => 'required',
		'observation' => 'required',
    ];

    protected $perPage = 20;

    /**
     * Attributes that should be mass-assignable.
     *
     * @var array
     */
    protected $fillable = ['date','typeMovement_id','order','consumption','businessName','supplier_id','rawMaterial','amount','origin_id','destination_id','location_id','observation'];


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
    public function location()
    {
        return $this->hasOne('App\Models\Location', 'id', 'location_id');
    }
    
    /**
     * @return \Illuminate\Database\Eloquent\Relations\HasOne
     */
    public function origin()
    {
        return $this->hasOne('App\Models\Origin', 'id', 'origin_id');
    }
    
    /**
     * @return \Illuminate\Database\Eloquent\Relations\HasOne
     */
    public function rawMaterial()
    {
        return $this->hasOne('App\Models\RawMaterial', 'id', 'rawMaterial');
    }
    
    /**
     * @return \Illuminate\Database\Eloquent\Relations\HasOne
     */
    public function supplier()
    {
        return $this->hasOne('App\Models\Supplier', 'id', 'supplier_id');
    }
    
    /**
     * @return \Illuminate\Database\Eloquent\Relations\HasOne
     */
    public function typeMovement()
    {
        return $this->hasOne('App\Models\TypeMovement', 'id', 'typeMovement_id');
    }
    

}
