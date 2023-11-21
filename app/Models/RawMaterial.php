<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

/**
 * Class RawMaterial
 *
 * @property $id
 * @property $name
 * @property $created_at
 * @property $updated_at
 *
 * @property RawMaterialMovement[] $rawMaterialMovements
 * @package App
 * @mixin \Illuminate\Database\Eloquent\Builder
 */
class RawMaterial extends Model
{
    
    static $rules = [
		'name' => 'required',
    ];

    protected $perPage = 20;

    /**
     * Attributes that should be mass-assignable.
     *
     * @var array
     */
    protected $fillable = ['name'];


    /**
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function rawMaterialMovements()
    {
        return $this->hasMany('App\Models\RawMaterialMovement', 'rawMaterial', 'id');
    }
    

}
