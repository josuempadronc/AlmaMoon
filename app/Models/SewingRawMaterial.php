<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

/**
 * Class SewingRawMaterial
 *
 * @property $id
 * @property $name
 * @property $color_id
 * @property $AmountRoll
 * @property $AmountMts
 * @property $created_at
 * @property $updated_at
 *
 * @property Color $color
 * @property SewingConsumption[] $sewingConsumptions
 * @property SewingMovement[] $sewingMovements
 * @package App
 * @mixin \Illuminate\Database\Eloquent\Builder
 */
class SewingRawMaterial extends Model
{
    
    static $rules = [
		'name' => 'required',
		'color_id' => 'required',
		'AmountRoll' => 'required',
		'AmountMts' => 'required',
    ];

    protected $perPage = 20;

    /**
     * Attributes that should be mass-assignable.
     *
     * @var array
     */
    protected $fillable = ['name','color_id','AmountRoll','AmountMts'];


    /**
     * @return \Illuminate\Database\Eloquent\Relations\HasOne
     */
    public function color()
    {
        return $this->hasOne('App\Models\Color', 'id', 'color_id');
    }
    
    /**
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function sewingConsumptions()
    {
        return $this->hasMany('App\Models\SewingConsumption', 'rawMaterial_id', 'id');
    }
    
    /**
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function sewingMovements()
    {
        return $this->hasMany('App\Models\SewingMovement', 'rawMaterial_id', 'id');
    }
    

}
