<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Pessoa extends Model
{
  protected $connection = 'pgsql';
  protected $table = 'tb_posto_graduacao';

}
