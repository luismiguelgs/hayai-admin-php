<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class DetalleSalida extends Model
{
    use SoftDeletes;
    protected $table = 'detalle_salidas';
    public $fillable = [
        'salida_id',
        'producto_id',
        'cantidad',
        'precio',
    ];
    protected $dates = ['deleted_at'];
}
