<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

/**
 * Class SemiFinishedMovement
 *
 * @property $id
 * @property $date
 * @property $typeMovement_id
 * @property $code
 * @property $order
 * @property $batch
 * @property $supplier_id
 * @property $SemifinishedProduct_id
 * @property $amount
 * @property $measures_id
 * @property $origin_id
 * @property $destination_id
 * @property $created_at
 * @property $updated_at
 *
 * @property Destination $destination
 * @property Measure $measure
 * @property Origin $origin
 * @property SemiFinishedProduct $semiFinishedProduct
 * @property Supplier $supplier
 * @property TypeMovement $typeMovement
 * @package App
 * @mixin \Illuminate\Database\Eloquent\Builder
 */
class SemiFinishedMovement extends Model
{

    static $rules = [
		'date' => 'required',
		'typeMovement_id' => 'required',
		'code' => 'required',
		'order' => 'required',
		'batch' => 'required',
		'supplier_id' => 'required',
		'SemifinishedProduct_id' => 'required',
		'amount' => 'required',
		'measures_id' => 'required',
		'origin_id' => 'required',
		'destination_id' => 'required',
    ];

    protected $perPage = 20;

    /**
     * Attributes that should be mass-assignable.
     *
     * @var array
     */
    protected $fillable = ['date','typeMovement_id','code','order','batch','supplier_id','SemifinishedProduct_id','amount','measures_id','origin_id','destination_id'];


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
    public function semiFinishedProduct()
    {
        return $this->hasOne('App\Models\SemiFinishedProduct', 'id', 'SemifinishedProduct_id');
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
