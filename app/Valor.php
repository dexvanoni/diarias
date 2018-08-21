<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Valor extends Model
{
  protected $connection = 'pgsql';
  protected $table = 'tb_valores_diaria';

  protected $fillable = [
    'posto', 'valor'
  ];

}
