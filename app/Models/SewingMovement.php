<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

/**
 * Class SewingMovement
 *
 * @property $id
 * @property $date
 * @property $typeMovement_id
 * @property $note
 * @property $rawMaterial_id
 * @property $supplier_id
 * @property $amountRoll
 * @property $amountMts
 * @property $color_id
 * @property $origin_id
 * @property $observation
 * @property $created_at
 * @property $updated_at
 *
 * @property Color $color
 * @property Origin $origin
 * @property SewingRawMaterial $sewingRawMaterial
 * @property Supplier $supplier
 * @property TypeMovement $typeMovement
 * @package App
 * @mixin \Illuminate\Database\Eloquent\Builder
 */
class SewingMovement extends Model
{
    
    static $rules = [
		'date' => 'required',
		'typeMovement_id' => 'required',
		'note' => 'required',
		'rawMaterial_id' => 'required',
		'supplier_id' => 'required',
		'amountRoll' => 'required',
		'amountMts' => 'required',
		'color_id' => 'required',
		'origin_id' => 'required',
		'observation' => 'required',
    ];

    protected $perPage = 20;

    /**
     * Attributes that should be mass-assignable.
     *
     * @var array
     */
    protected $fillable = ['date','typeMovement_id','note','rawMaterial_id','supplier_id','amountRoll','amountMts','color_id','origin_id','observation'];


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
    public function origin()
    {
        return $this->hasOne('App\Models\Origin', 'id', 'origin_id');
    }
    
    /**
     * @return \Illuminate\Database\Eloquent\Relations\HasOne
     */
    public function sewingRawMaterial()
    {
        return $this->hasOne('App\Models\SewingRawMaterial', 'id', 'rawMaterial_id');
    }
    
    /**
     * @return \Illuminate\Database\Eloquent\Relations\HasOne
     */
    public function supplier()
    {
        return $this->hasOne('App\Models\Supplier', 'id', 'supplier_id');
    }
    
    /**
     * @return \Illuminate\Database\Eloquent\Relations\HasOne
     */
    public function typeMovement()
    {
        return $this->hasOne('App\Models\TypeMovement', 'id', 'typeMovement_id');
    }
    

}
