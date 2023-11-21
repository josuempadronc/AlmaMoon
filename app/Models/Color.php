<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

/**
 * Class Color
 *
 * @property $id
 * @property $name
 * @property $created_at
 * @property $updated_at
 *
 * @property FinishedProduct[] $finishedProducts
 * @property SemiFinishedProduct[] $semiFinishedProducts
 * @package App
 * @mixin \Illuminate\Database\Eloquent\Builder
 */
class Color extends Model
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
    public function finishedProducts()
    {
        return $this->hasMany('App\Models\FinishedProduct', 'color_id', 'id');
    }
    
    /**
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function semiFinishedProducts()
    {
        return $this->hasMany('App\Models\SemiFinishedProduct', 'color_id', 'id');
    }
    

}
