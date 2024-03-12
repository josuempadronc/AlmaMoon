<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

/**
 * Class AssemblyAccessory
 *
 * @property $id
 * @property $name
 * @property $color_id
 * @property $amount
 * @property $created_at
 * @property $updated_at
 *
 * @property AssemblyStructure[] $assemblyStructures
 * @property Color $color
 * @package App
 * @mixin \Illuminate\Database\Eloquent\Builder
 */
class AssemblyAccessory extends Model
{
    
    static $rules = [
		'name' => 'required',
		'color_id' => 'required',
    ];

    protected $perPage = 20;

    /**
     * Attributes that should be mass-assignable.
     *
     * @var array
     */
    protected $fillable = ['name','color_id','amount'];


    /**
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function assemblyStructures()
    {
        return $this->hasMany('App\Models\AssemblyStructure', 'accessory_id', 'id');
    }
    
    /**
     * @return \Illuminate\Database\Eloquent\Relations\HasOne
     */
    public function color()
    {
        return $this->hasOne('App\Models\Color', 'id', 'color_id');
    }
    

}
