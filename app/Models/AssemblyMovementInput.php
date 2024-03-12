<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

/**
 * Class AssemblyMovementInput
 *
 * @property $id
 * @property $date
 * @property $typeMovement_id
 * @property $order
 * @property $note
 * @property $input_id
 * @property $amount
 * @property $color_id
 * @property $origin_id
 * @property $movementDeatil_id
 * @property $location_id
 * @property $observation
 * @property $created_at
 * @property $updated_at
 *
 * @property AssemblyInput $assemblyInput
 * @property Color $color
 * @property Location $location
 * @property Origin $origin
 * @property TypeMovement $typeMovement
 * @package App
 * @mixin \Illuminate\Database\Eloquent\Builder
 */
class AssemblyMovementInput extends Model
{
    
    static $rules = [
		'date' => 'required',
		'typeMovement_id' => 'required',
		'origin_id' => 'required',
		'movementDeatil_id' => 'required',
		'location_id' => 'required',
    ];

    protected $perPage = 20;

    /**
     * Attributes that should be mass-assignable.
     *
     * @var array
     */
    protected $fillable = ['date','typeMovement_id','order','note','input_id','amount','color_id','origin_id','movementDeatil_id','location_id','observation'];


    /**
     * @return \Illuminate\Database\Eloquent\Relations\HasOne
     */
    public function assemblyInput()
    {
        return $this->hasOne('App\Models\AssemblyInput', 'id', 'input_id');
    }
    
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
    public function location()
    {
        return $this->hasOne('App\Models\Location', 'id', 'location_id');
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
    public function typeMovement()
    {
        return $this->hasOne('App\Models\TypeMovement', 'id', 'typeMovement_id');
    }
    

}
