<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

/**
 * Class PaintMovement
 *
 * @property $id
 * @property $date
 * @property $typeMovement_id
 * @property $nota
 * @property $order
 * @property $Product
 * @property $amount
 * @property $measures_id
 * @property $origin_id
 * @property $observation
 * @property $created_at
 * @property $updated_at
 *
 * @property Measure $measure
 * @property Origin $origin
 * @property TypeMovement $typeMovement
 * @package App
 * @mixin \Illuminate\Database\Eloquent\Builder
 */
class PaintMovement extends Model
{
    
    static $rules = [
		'date' => 'required',
		'typeMovement_id' => 'required',
		'nota' => 'required',
		'order' => 'required',
		'Product' => 'required',
		'amount' => 'required',
		'measures_id' => 'required',
		'observation' => 'required',
    ];

    protected $perPage = 20;

    /**
     * Attributes that should be mass-assignable.
     *
     * @var array
     */
    protected $fillable = ['date','typeMovement_id','nota','order','Product','amount','measures_id','origin_id','observation'];


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
    public function origin()
    {
        return $this->hasOne('App\Models\Origin', 'id', 'origin_id');
    }
    
    /**
     * @return \Illuminate\Database\Eloquent\Relations\HasOne
     */
    public function typeMovement()
    {
        return $this->hasOne('App\Models\TypeMovement', 'id', 'typeMovement_id');
    }
    

}
