<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

/**
 * Class Origin
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
class Origin extends Model
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
        return $this->hasMany('App\Models\Movement', 'origin_id', 'id');
    }
    
    /**
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function semiFinishedMovements()
    {
        return $this->hasMany('App\Models\SemiFinishedMovement', 'origin_id', 'id');
    }
    

}
