<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

/**
 * Class WindmillProductDelivered
 *
 * @property $id
 * @property $name
 * @property $amount
 * @property $created_at
 * @property $updated_at
 *
 * @package App
 * @mixin \Illuminate\Database\Eloquent\Builder
 */
class WindmillProductDelivered extends Model
{
    
    static $rules = [
		'name' => 'required',
		'amount' => 'required',
    ];

    protected $perPage = 20;

    /**
     * Attributes that should be mass-assignable.
     *
     * @var array
     */
    protected $fillable = ['name','amount'];



}
