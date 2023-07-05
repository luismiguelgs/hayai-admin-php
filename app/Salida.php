<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Salida extends Model
{
    use SoftDeletes;
    protected $table = 'salidas';
    public $fillable = [
        'periodo',
        'serie',
        'numero',
        'comprobante_id',
        'operacion_id',
    ];
    protected $dates = ['deleted_at'];
}
