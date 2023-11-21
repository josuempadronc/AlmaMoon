<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

/**
 * Class Supplier
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
class Supplier extends Model
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
        return $this->hasMany('App\Models\SemiFinishedMovement', 'supplier_id', 'id');
    }
    

}
