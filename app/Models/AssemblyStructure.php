<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

/**
 * Class AssemblyStructure
 *
 * @property $id
 * @property $name_input
 * @property $color_input
 * @property $accessory_id
 * @property $amount
 * @property $created_at
 * @property $updated_at
 *
 * @property AssemblyAccessory $assemblyAccessory
 * @property AssemblyInput $assemblyInput
 * @property AssemblyInput $assemblyInput
 * @package App
 * @mixin \Illuminate\Database\Eloquent\Builder
 */
class AssemblyStructure extends Model
{

    static $rules = [
		'name_input' => 'required',
		'color_input' => 'required',
		'accessory_id' => 'required',
    ];

    protected $perPage = 20;

    /**
     * Attributes that should be mass-assignable.
     *
     * @var array
     */
    protected $fillable = ['name_input','color_input','accessory_id','amount'];


    /**
     * @return \Illuminate\Database\Eloquent\Relations\HasOne
     */
    public function assemblyAccessory()
    {
        return $this->hasOne('App\Models\AssemblyAccessory', 'id', 'accessory_id');
    }

    /**
     * @return \Illuminate\Database\Eloquent\Relations\HasOne
     */
    public function assemblyInputColor()
    {
        return $this->hasOne('App\Models\AssemblyInput', 'id', 'color_input');
    }

    /**
     * @return \Illuminate\Database\Eloquent\Relations\HasOne
     */
    public function assemblyInputName()
    {
        return $this->hasOne('App\Models\AssemblyInput', 'id', 'name_input');
    }


}
