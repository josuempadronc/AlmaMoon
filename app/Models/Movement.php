<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

/**
 * Class Movement
 *
 * @property $id
 * @property $typeMovement_id
 * @property $movementDeatil_id
 * @property $code
 * @property $order
 * @property $batch
 * @property $businessName
 * @property $observation
 * @property $location_id
 * @property $origin_id
 * @property $finishedProduct_id
 * @property $assembledProduct_id
 * @property $amount
 * @property $date
 * @property $destination_id
 * @property $created_at
 * @property $updated_at
 *
 * @property AssembledProduct $assembledProduct
 * @property Destination $destination
 * @property FinishedProduct $finishedProduct
 * @property Location $location
 * @property MovementDetail $movementDetail
 * @property Origin $origin
 * @property TypeMovement $typeMovement
 * @package App
 * @mixin \Illuminate\Database\Eloquent\Builder
 */
class Movement extends Model
{

    static $rules = [
        'typeMovement_id' => 'required',
        'movementDeatil_id' => 'required',
        'code' => 'required',
        'order' => 'required',
        'batch' => 'required',
        'businessName',
        'observation',
        'location_id' => 'required',
        'origin_id' => 'required',
        'finishedProduct_id',
        'assembledProduct_id',
        'amount' => 'required',
        'date' => 'required',
        'destination_id',
    ];

    protected $perPage = 20;

    /**
     * Attributes that should be mass-assignable.
     *
     * @var array
     */
    protected $fillable = [
        'typeMovement_id',
        'movementDeatil_id',
        'code',
        'order',
        'batch',
        'businessName',
        'observation',
        'location_id',
        'origin_id',
        'finishedProduct_id',
        'assembledProduct_id',
        'amount',
        'date',
        'destination_id'
    ];

    protected static function boot()
    {
        parent::boot();

        static::saved(function ($movement) {
            $finishedProduct = $movement->finishedProduct;

            if ($movement->typeMovement->name === 'Entrada') {
                $finishedProduct->stock += $movement->amount;
            } elseif ($movement->typeMovement->name === 'Salida') {
                $finishedProduct->stock -= $movement->amount;
            }

            $finishedProduct->save();
            // dd($finishedProduct);
        });
    }

    /**
     * @return \Illuminate\Database\Eloquent\Relations\HasOne
     */
    public function assembledProduct()
    {
        return $this->hasOne('App\Models\AssembledProduct', 'id', 'assembledProduct_id');
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
    public function movementDetail()
    {
        return $this->hasOne('App\Models\MovementDetail', 'id', 'movementDeatil_id');
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
