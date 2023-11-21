<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

/**
 * Class Destination
 *
 * @property $id
 * @property $name
 * @property $created_at
 * @property $updated_at
 *
 * @property Movement[] $movements
 * @property SemiFinishedMovement[] $semiFinishedMovements
 * @package App
 * @mixin \Illuminate\Database\Eloquent\Builder
 */
class Destination extends Model
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
    public function movements()
    {
        return $this->hasMany('App\Models\Movement', 'destination_id', 'id');
    }
    
    /**
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function semiFinishedMovements()
    {
        return $this->hasMany('App\Models\SemiFinishedMovement', 'destination_id', 'id');
    }
    

}
