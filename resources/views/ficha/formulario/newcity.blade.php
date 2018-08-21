<div class="row">
  <div title="Informe a cidade de realização do serviço" class="col-md-4">
    <div class="input-group">
      <span class="input-group-addon" id="basic-addon1">19</span>
      {!! Form::select('local_servico', ['placeholder'=>'LOCAL DE REALIZAÇÃO DO SERVIÇO (Cidade):', 'val_br_am_rj'=>'Brasília, Manaus ou Rio de Janeiro', 'val_bh_fl_pa_rc_sl_sp'=> 'Belo Horizonte, Fortaleza, Porto Alegre, Recife, Salvador ou São Paulo', 'val_capitais'=>'Outra capital de Estado', 'val_cidades'=>'Outra Cidade'], null, ['class' => 'form-control input-sm', 'title'=>'LOCAL DE REALIZAÇÃO DO SERVIÇO (Cidade)', 'id'=>'local_servico']) !!}
    </div>
  </div>
  <div class="col-md-2">
    {!! Form::input('checkbox', 'houve_pernoite', $value = "s", $attributes = ['id'=>'hp']) !!}&nbsp&nbsp&nbspHouve Pernoite?
  </div>
  <div class="col-sm-2">
    {!! Form::text('qt_pernoite', null, array('id'=>'qt_pernoite','class' =>'form-control input-sm', 'placeholder'=>'QNT DE PERNOITES:')) !!}
  </div>
  <div title="Informe os locais de pernoite" class="col-md-4">
    <div class="input-group">
      <span class="input-group-addon" id="basic-addon1">20</span>
      {!! Form::text('local_pernoite', null, array('class' =>'form-control input-sm', 'placeholder'=>'LOCAL(IS) DE PERNOITE:')) !!}
    </div>
  </div>
  <p></p>
</div>
<p></p>
<div class="row">
  <div title="Informe a data e hora de início e retorno do afastamento da sede" class="col-md-4">
    <div class="input-group">
      <span class="input-group-addon" id="basic-addon1">21 - AFASTAMENTO DE SEDE:</span>
      {!! Form::text('data_afastamento_inicio', null, array('class' => 'form-control input-sm a', 'placeholder'=>'Data Início:', 'id'=>'dt_ida')) !!}
      {!! Form::text('hora_afastamento_inicio', null, array('class' => 'form-control input-sm a', 'placeholder'=>'Hora:', 'id'=>'hr_ida')) !!}
      {!! Form::text('data_afastamento_retorno', null, array('class' => 'form-control input-sm a', 'placeholder'=>'Data Retorno:', 'id'=>'dt_ret')) !!}
      {!! Form::text('hora_afastamento_retorno', null, array('class' => 'form-control input-sm a', 'placeholder'=>'Hora:', 'id'=>'hr_ret')) !!}
    </div>
  </div>
  <div class="col-md-4">
    <div class="input-group">
      <span class="input-group-addon" id="basic-addon1">22</span>
      {!! Form::select('adicional_deslocamento', ['placeholder'=>'Informe se houve ou não adicional de deslocamento:', 'SIM'=>'SIM', 'NÃO'=> 'NÃO'], null, ['id'=>'h_d', 'class' => 'form-control input-sm a'], null, ['title'=>'(§1º, do Art.20, do Dec. 4.307/2002, alterado pelo Dec.6.907/2009)']) !!}
      {!! Form::select('total_acrescimos', ['placeholder'=>'TOTAL DE ACRÉSCIMOS:', 'DIÁRIA COMPLETA'=>'DIÁRIA COMPLETA', '1/2 DIÁRIA'=> '1/2 DIÁRIA'], null, ['class' => 'form-control input-sm a', 'id'=>'total_acrescimos'], null, ['title'=>'Informe se Diária completa ou 1/2 diária']) !!}
    </div>
    <div style="border: 1px solid #D3D3D3; border-radius:3px" class="input-group">
      <span style="border: 1px solid #D3D3D3; border-radius:3px; font-size: 10px" class="input-group-addon" id="basic-addon1">23 - VALOR TOTAL (Diária + Adc. Desl.)<br><br><br>Sem custo = </span>
      {!! Form::text('valor_total', null, array('title'=>'Valor total de diárias + adicionais de deslocamento', 'class' => 'form-control input-sm a', 'placeholder'=>'R$', 'id'=>'valor_total', 'readonly'=>'readonly')) !!}
      {!! Form::input('checkbox', 'ck_valor_total', $value = "Sem Custo", $attributes = ['id'=>'zc', 'class' => 'form-control input-sm a']) !!}
    </div>
  </div>
  <div class="col-md-4">
    <div class="input-group">
      <span title="Informe se faz jus a auxílio transporte" style="border: 1px solid #D3D3D3; border-radius:3px" class="input-group-addon" id="basic-addon1">24 - AUXÍLIO TRANSPORTE:&nbsp</span>
      <div style="border: 1px solid #D3D3D3; border-radius:3px" class="radio">
        &nbsp&nbsp&nbsp&nbsp&nbsp&nbsp{!! Form::radio('rd_auxtransporte', 'SIM', null, ['id'=>'trans_s']) !!}SIM<br>
        <div id="t_s">
          {!! Form::text('t_s', null, array('title'=>'Valor de transporte', 'class' => 'form-control input-sm a', 'placeholder'=>'R$', 'id'=>'valor_transp')) !!}
        </div>
        &nbsp&nbsp&nbsp&nbsp&nbsp&nbsp{!! Form::radio('rd_auxtransporte', 'NÃO', null, ['id'=>'trans_n']) !!}NÃO<br>
      </div>
    </div>
    <div class="input-group">
      <span title="Informe se faz jus a auxílio alimentação" style="border: 1px solid #D3D3D3; border-radius:3px" class="input-group-addon" id="basic-addon1">25 - AUXÍLIO ALIMENTAÇÃO:</span>
      <div style="border: 1px solid #D3D3D3; border-radius:3px" class="radio">
        &nbsp&nbsp&nbsp&nbsp&nbsp&nbsp{!! Form::radio('rd_auxalimentacao', 'SIM', null, ['id'=>'al_s']) !!}SIM<br>
        <div id="a_s">
          {!! Form::text('a_s', null, array('title'=>'Valor de Alimentação', 'class' => 'form-control input-sm a', 'placeholder'=>'R$', 'id'=>'valor_alim')) !!}
        </div>
        &nbsp&nbsp&nbsp&nbsp&nbsp&nbsp{!! Form::radio('rd_auxalimentacao', 'NÃO', null, ['id'=>'al_n']) !!}NÃO<br>
      </div>
    </div>
  </div>
</div>
<p></p>
