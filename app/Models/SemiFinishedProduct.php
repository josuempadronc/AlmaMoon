<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

/**
 * Class SemiFinishedProduct
 *
 * @property $id
 * @property $color_id
 * @property $name
 * @property $created_at
 * @property $updated_at
 *
 * @property Color $color
 * @property SemiFinishedMovement[] $semiFinishedMovements
 * @package App
 * @mixin \Illuminate\Database\Eloquent\Builder
 */
class SemiFinishedProduct extends Model
{

    static $rules = [
		'color_id' => 'required',
		'name' => 'required',
        'stock' => 'required',
    ];

    protected $perPage = 20;

    /**
     * Attributes that should be mass-assignable.
     *
     * @var array
     */
    protected $fillable = ['color_id','name','stock'];


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
    public function semiFinishedMovements()
    {
        return $this->hasMany('App\Models\SemiFinishedMovement', 'SemifinishedProduct_id', 'id');
    }


}
