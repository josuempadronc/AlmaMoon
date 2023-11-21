<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

/**
 * Class Paw
 *
 * @property $id
 * @property $name
 * @property $created_at
 * @property $updated_at
 *
 * @property FinishedProduct[] $finishedProducts
 * @package App
 * @mixin \Illuminate\Database\Eloquent\Builder
 */
class Paw extends Model
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
        return $this->hasMany('App\Models\FinishedProduct', 'paw_id', 'id');
    }
    

}
