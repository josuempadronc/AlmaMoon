<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

/**
 * Class ProductComponent
 *
 * @property $id
 * @property $product_sheat_id
 * @property $component
 * @property $amount
 * @property $created_at
 * @property $updated_at
 *
 * @property ProductSheat $productSheat
 * @package App
 * @mixin \Illuminate\Database\Eloquent\Builder
 */
class ProductComponent extends Model
{
    
    static $rules = [
		'product_sheat_id' => 'required',
		'component' => 'required',
		'amount' => 'required',
    ];

    protected $perPage = 20;

    /**
     * Attributes that should be mass-assignable.
     *
     * @var array
     */
    protected $fillable = ['product_sheat_id','component','amount'];


    /**
     * @return \Illuminate\Database\Eloquent\Relations\HasOne
     */
    public function productSheat()
    {
        return $this->hasOne('App\Models\ProductSheat', 'id', 'product_sheat_id');
    }
    

}
