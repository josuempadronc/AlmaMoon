<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

/**
 * Class InyecionRawMaterial
 *
 * @property $id
 * @property $name
 * @property $count
 * @property $created_at
 * @property $updated_at
 *
 * @property InyecionConsumptionRaw[] $inyecionConsumptionRaws
 * @package App
 * @mixin \Illuminate\Database\Eloquent\Builder
 */
class InyecionRawMaterial extends Model
{
    
    static $rules = [
		'name' => 'required',
		'count' => 'required',
    ];

    protected $perPage = 20;

    /**
     * Attributes that should be mass-assignable.
     *
     * @var array
     */
    protected $fillable = ['name','count'];


    /**
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function inyecionConsumptionRaws()
    {
        return $this->hasMany('App\Models\InyecionConsumptionRaw', 'rawMaterial_id', 'id');
    }
    

}
