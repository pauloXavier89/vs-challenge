<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Produtos extends Model
{
    use SoftDeletes;

    protected $fillable = ['nome','marca','quantidade','preco'];

    protected $dates = ['deleted_at'];
}
