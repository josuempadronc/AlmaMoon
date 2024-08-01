<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

/**
 * Class InyecionProduction
 *
 * @property $id
 * @property $date
 * @property $finishedProduct_id
 * @property $color_id
 * @property $paw_id
 * @property $amount
 * @property $Maquina
 * @property $destination_id
 * @property $location_id
 * @property $observation
 *
 * @property Color $color
 * @property Destination $destination
 * @property FinishedProduct $finishedProduct
 * @property Location $location
 * @property Paw $paw
 * @package App
 * @mixin \Illuminate\Database\Eloquent\Builder
 */
class InyecionProduction extends Model
{
    
    static $rules = [
		'date' => 'required',
		'finishedProduct_id' => 'required',
		'color_id' => 'required',
		'paw_id' => 'required',
		'amount' => 'required',
		'Maquina' => 'required',
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
    protected $fillable = ['date','finishedProduct_id','color_id','paw_id','amount','Maquina','destination_id','location_id','observation'];


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
    

}
