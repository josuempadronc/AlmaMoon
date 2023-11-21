<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

/**
 * Class FinishedProduct
 *
 * @property $id
 * @property $color_id
 * @property $paw_id
 * @property $name
 * @property $created_at
 * @property $updated_at
 *
 * @property Color $color
 * @property Movement[] $movements
 * @property Paw $paw
 * @package App
 * @mixin \Illuminate\Database\Eloquent\Builder
 */
class FinishedProduct extends Model
{

    static $rules = [
        'color_id' => 'required',
        'paw_id' => 'required',
        'name' => 'required',
        'stock' => 'required',
    ];

    protected $perPage = 20;

    /**
     * Attributes that should be mass-assignable.
     *
     * @var array
     */
    protected $fillable = ['color_id', 'paw_id', 'name', 'stock'];


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
    public function movements()
    {
        return $this->hasMany('App\Models\Movement', 'finishedProduct_id', 'id');
    }

    /**
     * @return \Illuminate\Database\Eloquent\Relations\HasOne
     */
    public function paw()
    {
        return $this->hasOne('App\Models\Paw', 'id', 'paw_id');
    }
}
