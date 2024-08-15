<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

/**
 * Class MechanicsSemifinished
 *
 * @property $id
 * @property $name
 * @property $amount
 * @property $created_at
 * @property $updated_at
 *
 * @property MechanicsConsumptionSemifinished[] $mechanicsConsumptionSemifinisheds
 * @package App
 * @mixin \Illuminate\Database\Eloquent\Builder
 */
class MechanicsSemifinished extends Model
{
    
    static $rules = [
		'name' => 'required',
		'amount' => 'required',
    ];

    protected $perPage = 20;

    /**
     * Attributes that should be mass-assignable.
     *
     * @var array
     */
    protected $fillable = ['name','amount'];


    /**
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function mechanicsConsumptionSemifinisheds()
    {
        return $this->hasMany('App\Models\MechanicsConsumptionSemifinished', 'semiFinished_id', 'id');
    }
    

}
