<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

/**
 * Class InyecionRequest
 *
 * @property $id
 * @property $date
 * @property $typeMovement_id
 * @property $order
 * @property $finishedProduct_id
 * @property $color_id
 * @property $paw_id
 * @property $amount
 * @property $amountToManofacture
 * @property $amountManofacture
 * @property $observation
 * @property $created_at
 * @property $updated_at
 *
 * @property Color $color
 * @property FinishedProduct $finishedProduct
 * @property Paw $paw
 * @property TypeMovement $typeMovement
 * @package App
 * @mixin \Illuminate\Database\Eloquent\Builder
 */
class InyecionRequest extends Model
{
    
    static $rules = [
		'date' => 'required',
		'typeMovement_id' => 'required',
		'order' => 'required',
		'finishedProduct_id' => 'required',
		'color_id' => 'required',
		'paw_id' => 'required',
		'amount' => 'required',
		'amountToManofacture' => 'required',
		'amountManofacture' => 'required',
		'observation' => 'required',
    ];

    protected $perPage = 20;

    /**
     * Attributes that should be mass-assignable.
     *
     * @var array
     */
    protected $fillable = ['date','typeMovement_id','order','finishedProduct_id','color_id','paw_id','amount','amountToManofacture','amountManofacture','observation'];


    /**
     * @return \Illuminate\Database\Eloquent\Relations\HasOne
     */
    public function color()
    {
        return $this->hasOne('App\Models\Color', 'id', 'color_id');
    }
    
    /**
     * @return \Illuminate\Database\Eloquent\Relations\HasOne
     */
    public function finishedProduct()
    {
        return $this->hasOne('App\Models\FinishedProduct', 'id', 'finishedProduct_id');
    }
    
    /**
     * @return \Illuminate\Database\Eloquent\Relations\HasOne
     */
    public function paw()
    {
        return $this->hasOne('App\Models\Paw', 'id', 'paw_id');
    }
    
    /**
     * @return \Illuminate\Database\Eloquent\Relations\HasOne
     */
    public function typeMovement()
    {
        return $this->hasOne('App\Models\TypeMovement', 'id', 'typeMovement_id');
    }
    

}
