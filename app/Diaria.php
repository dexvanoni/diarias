<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use App\Diaria;
use App\Trecho;

class Diaria extends Model
{
  protected $connection = 'pgsql';
  protected $table = 'diarias';
  protected $schema = 'diarias';

  public function trechos(){
    return $this->hasMany(Trecho::class);
  }

  protected $fillable = [
    'sc',
    'pcdp',
    'pescodigo',
    'id',
    'pnome',
    'saram',
    'cpf',
    'banco',
    'agencia',
    'conta',
    'email',
    'datanascimento',
    'enquadramento',
    'identidade',
    'om',
    'telefone',
    'servico',
    'documentos',
    'ne',
    'em_proveito',
    'custeio',
    'fim_semana',
    'conveniencia_servico',
    'justificativa',
    'alteracao_servico',
    'justificativa_alteracao',
    'dia',
    'mes',
    'responsavel',
    'val_br_am_rj',
    'qt_br_am_rj',
    'resultado1',
    'val_bh_fl_pa_rc_sl_sp',
    'qt_bh_fl_pa_rc_sl_sp',
    'resultado2',
    'val_capitais',
    'qt_capitais',
    'resultado3',
    'val_cidades',
    'qt_cidades',
    'resultado4',
    'qt_acrescimo',
    'val_ac',
    'desc_a',
    'qt_dias_a',
    'resultado_dias_a',
    'desc_b',
    'qt_dias_b',
    'resultado_dias_b',
    'resultado_total',
    'conforme_previsto',
    'conforme_forca_maior',
    'qt_meia_diaria',
    'localidade_meia_diaria',
    'qt_diaria_completa',
    'localidade_diaria_completa',
    'num_total_acrescimos',
    'restituicao',
    'valor_restituicao',
    'dono',
    'qtn_md',
    'qtn_dc',
    'trechos',
    'ax_t',
    'ax_a',
    'concluido',
    'adicional_deslocamento',
    'total_acrescimos',
    'valor_total',
    'ck_valor_total',
    'tipo_transp',
    'chefe_im',
    'ok_chefe_im',
    'nm_chefe_im',
    'subtotal',
    'ant_dir',
    'val_ant',
    'obs_ant'
  ];


}
