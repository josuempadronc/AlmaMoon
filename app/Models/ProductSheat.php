<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

/**
 * Class ProductSheat
 *
 * @property $id
 * @property $name
 * @property $color_id
 * @property $input_id
 * @property $amount
 * @property $created_at
 * @property $updated_at
 *
 * @property AssemblyInput $assemblyInput
 * @property Color $color
 * @property ProductComponent[] $productComponents
 * @package App
 * @mixin \Illuminate\Database\Eloquent\Builder
 */
class ProductSheat extends Model
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
    protected $fillable = ['name', 'color_id'];


    /**
     * @return \Illuminate\Database\Eloquent\Relations\HasOne
     */
    public function assemblyInput()
    {
        return $this->hasOne('App\Models\AssemblyInput', 'id', 'assembly_input_id');
    }

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
    // public function productComponents()
    // {
    //     return $this->hasMany('App\Models\ProductComponent', 'product_sheat_id', 'id');
    // }
    public function assemblyInputs()
    {
        return $this->belongsToMany(
            AssemblyInput::class,
            'product_components'
        )->withPivot('amount');
    }

}
