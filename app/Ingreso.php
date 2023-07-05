<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Ingreso extends Model
{
    use SoftDeletes;
    protected $table = 'ingresos';
    public $fillable = [
        'periodo',
        'serie',
        'numero',
        'comprobante_id',
        'operacion_id',
        'proveedor_id'
    ];
    protected $dates = ['deleted_at'];
}
