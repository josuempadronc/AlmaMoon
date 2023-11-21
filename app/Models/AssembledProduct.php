<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

/**
 * Class AssembledProduct
 *
 * @property $id
 * @property $name
 * @property $SemifinishedProduct_id
 * @property $amount
 * @property $Observation
 * @property $created_at
 * @property $updated_at
 *
 * @property Movement[] $movements
 * @property SemiFinishedProduct $semiFinishedProduct
 * @package App
 * @mixin \Illuminate\Database\Eloquent\Builder
 */
class AssembledProduct extends Model
{
    
    static $rules = [
		'name' => 'required',
		'SemifinishedProduct_id' => 'required',
		'amount' => 'required',
		'Observation' => 'required',
    ];

    protected $perPage = 20;

    /**
     * Attributes that should be mass-assignable.
     *
     * @var array
     */
    protected $fillable = ['name','SemifinishedProduct_id','amount','Observation'];


    /**
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function movements()
    {
        return $this->hasMany('App\Models\Movement', 'assembledProduct_id', 'id');
    }
    
    /**
     * @return \Illuminate\Database\Eloquent\Relations\HasOne
     */
    public function semiFinishedProduct()
    {
        return $this->hasOne('App\Models\SemiFinishedProduct', 'id', 'SemifinishedProduct_id');
    }
    

}
