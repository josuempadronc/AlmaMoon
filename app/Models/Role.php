<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use App\Models\User;


/**
 * Class Role
 *
 * @property $id
 * @property $name
 * @property $created_at
 * @property $updated_at
 *
 * @package App
 * @mixin \Illuminate\Database\Eloquent\Builder
 */
class Role extends Model
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

    public function role()
    {
        return $this->belongsTo('App\Models\User','id', 'role');
    }



}
