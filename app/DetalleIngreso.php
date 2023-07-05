<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class DetalleIngreso extends Model
{
    use SoftDeletes;
    protected $table = 'detalle_ingresos';
    public $fillable = [
        'ingreso_id',
        'producto_id',
        'cantidad',
        'precio',
    ];
    protected $dates = ['deleted_at'];
}
