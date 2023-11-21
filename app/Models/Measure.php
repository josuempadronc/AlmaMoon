<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

/**
 * Class Measure
 *
 * @property $id
 * @property $name
 * @property $created_at
 * @property $updated_at
 *
 * @property SemiFinishedMovement[] $semiFinishedMovements
 * @package App
 * @mixin \Illuminate\Database\Eloquent\Builder
 */
class Measure extends Model
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
    public function semiFinishedMovements()
    {
        return $this->hasMany('App\Models\SemiFinishedMovement', 'measures_id', 'id');
    }
    

}
