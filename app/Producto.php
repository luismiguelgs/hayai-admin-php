<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Producto extends Model
{
    use SoftDeletes;
    protected $table = 'productos';
    public $fillable = [
        'nombre',
        'precio',
        'costo',
        'categoria_id',
        'subcategoria_id',
    ];
    protected $dates = ['deleted_at'];
}
