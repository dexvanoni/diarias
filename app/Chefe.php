<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Chefe extends Model
{
  protected $connection = 'pgsql';
  protected $table = 'chefes';
  protected $schema = 'diarias';

  protected $fillable = [
    'posto_grad',
    'nome_guerra',
    'nome_completo',
    'cargo'
  ];


}
