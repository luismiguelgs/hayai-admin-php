<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Subcategoria extends Model
{
    use SoftDeletes;
    protected $table = 'subcategorias';
    public $fillable = [
        'nombre',
        'categoria_id'
    ];
    protected $dates = ['deleted_at'];
}
