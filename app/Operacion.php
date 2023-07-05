<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Operacion extends Model
{
    use SoftDeletes;
    protected $table = 'operaciones';
    public $fillable = [
        'nombre'
    ];
    protected $dates = ['deleted_at'];
}
