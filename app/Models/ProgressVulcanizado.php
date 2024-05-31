<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

/**
 * Class ProgressVulcanizado
 *
 * @property $id
 * @property $finishedProduct_id
 * @property $cantidad
 * @property $status
 * @property $encargado
 * @property $nota
 * @property $fecha
 * @property $created_at
 * @property $updated_at
 *
 * @property FinishedProduct $finishedProduct
 * @package App
 * @mixin \Illuminate\Database\Eloquent\Builder
 */
class ProgressVulcanizado extends Model
{
    
    static $rules = [
		'cantidad' => 'required',
		'status' => 'required',
		'encargado' => 'required',
		'nota' => 'required',
		'fecha' => 'required',
    ];

    protected $perPage = 20;

    /**
     * Attributes that should be mass-assignable.
     *
     * @var array
     */
    protected $fillable = ['finishedProduct_id','cantidad','status','encargado','nota','fecha'];


    /**
     * @return \Illuminate\Database\Eloquent\Relations\HasOne
     */
    public function finishedProduct()
    {
        return $this->hasOne('App\Models\FinishedProduct', 'id', 'finishedProduct_id');
    }
    

}
