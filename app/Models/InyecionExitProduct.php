<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

/**
 * Class InyecionExitProduct
 *
 * @property $id
 * @property $date
 * @property $typeMovement_id
 * @property $order
 * @property $note
 * @property $finishedProduct_id
 * @property $color_id
 * @property $paw_id
 * @property $amount
 * @property $destination_id
 * @property $observation
 * @property $created_at
 * @property $updated_at
 *
 * @property Color $color
 * @property Destination $destination
 * @property FinishedProduct $finishedProduct
 * @property Paw $paw
 * @property TypeMovement $typeMovement
 * @package App
 * @mixin \Illuminate\Database\Eloquent\Builder
 */
class InyecionExitProduct extends Model
{
    
    static $rules = [
		'date' => 'required',
		'typeMovement_id' => 'required',
		'order' => 'required',
		'note' => 'required',
		'finishedProduct_id' => 'required',
		'color_id' => 'required',
		'paw_id' => 'required',
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
    protected $fillable = ['date','typeMovement_id','order','note','finishedProduct_id','color_id','paw_id','amount','destination_id','observation'];


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
