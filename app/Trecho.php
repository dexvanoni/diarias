<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use App\Diaria;

class Trecho extends Model
{
  protected $connection = 'pgsql';

  public function diarias()
    {
        return $this->belongsTo(Diaria::class);
    }

  protected $fillable = [
    'local_servico',
    'local_pernoite',
    'data_afastamento_inicio',
    'hora_afastamento_inicio',
    'data_afastamento_retorno',
    'hora_afastamento_retorno',
    'adicional_deslocamento',
    'total_acrescimos',
    'ck_valor_total',
    'valor_total',
    'a_s',
    't_s',
    'houve_pernoite',
    'qt_pernoite',
    'id',
    'diaria_id'
  ];


}
