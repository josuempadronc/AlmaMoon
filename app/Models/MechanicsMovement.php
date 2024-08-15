<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

/**
 * Class MechanicsMovement
 *
 * @property $id
 * @property $date
 * @property $typeMovement_id
 * @property $note
 * @property $order
 * @property $supplier_id
 * @property $Product or Material
 * @property $amountUnd
 * @property $amountMts
 * @property $amountKg
 * @property $origin_id
 * @property $observation
 * @property $created_at
 * @property $updated_at
 *
 * @property Origin $origin
 * @property Supplier $supplier
 * @property TypeMovement $typeMovement
 * @package App
 * @mixin \Illuminate\Database\Eloquent\Builder
 */
class MechanicsMovement extends Model
{

    static $rules = [
		'date' => 'required',
		'typeMovement_id' => 'required',
		'note' => 'required',
		'supplier_id' => 'required',
		'Product' => 'required',
		'amountUnd' => 'required',
		'origin_id' => 'required',
		'observation' => 'required',
    ];

    protected $perPage = 20;

    /**
     * Attributes that should be mass-assignable.
     *
     * @var array
     */
    protected $fillable = ['date','typeMovement_id','note','order','supplier_id','Product','amountUnd','amountMts','amountKg','origin_id','observation'];


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
