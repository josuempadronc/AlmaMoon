<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

/**
 * Class ProgressLona
 *
 * @property $id
 * @property $Producto
 * @property $cantidad
 * @property $status
 * @property $encargado
 * @property $nota
 * @property $fecha
 * @property $created_at
 * @property $updated_at
 *
 * @package App
 * @mixin \Illuminate\Database\Eloquent\Builder
 */
class ProgressLona extends Model
{
    
    static $rules = [
		'Producto' => 'required',
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
    protected $fillable = ['Producto','cantidad','status','encargado','nota','fecha'];



}
