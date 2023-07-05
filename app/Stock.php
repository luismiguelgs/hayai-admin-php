<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Stock extends Model
{
    use SoftDeletes;
    protected $table = 'stocks';
    public $fillable = [
        'cantidad',
        'producto_id'
    ];
    protected $dates = ['deleted_at'];
}
