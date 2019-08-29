<?php

namespace App\Model;

use Illuminate\Database\Eloquent\Model;

class Privilegios extends Model
{
    protected $fillable = ['id', 'nome'];
    public $timestamps = false;
}
