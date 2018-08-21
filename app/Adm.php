<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Adm extends Model
{
  protected $connection = 'pgsql';
  protected $table = 'tb_adm_diarias';

  protected $fillable = ['pescodigo', 'pnome'];
}
