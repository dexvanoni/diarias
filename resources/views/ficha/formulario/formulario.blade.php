@php
$val1 = Session::get('val1');
$val2 = Session::get('val2');
$val3 = Session::get('val3');
$val4 = Session::get('val4');
@endphp
<input type="hidden" name="_token" value="{!! csrf_token() !!}">
<div class="row">
  <div class="col-md-2">
    <img src="/bst/brasao.png" class="img-responsive" alt="" height="70em" width="70em" />
  </div>
  <div class="col-md-7">
    <center>
      <h4>COMANDO DA AERONÁUTICA</h4>
      <p>GRUPAMENTO DE APOIO DE CAMPO GRANDE</p>
      <div class="">
        @if ($tela == 'show')
          ORDEM DE SERVIÇO DE SOLICITAÇÃO DE DIÁRIAS Nº: {{ $os->id }}
        @else
          ORDEM DE SERVIÇO DE SOLICITAÇÃO DE DIÁRIAS
        @endif
        @php
        $don = Session::get('dono');
        @endphp
        @if ($tela == 'create')
          {!! Form::input('hidden', 'dono', $value = $don) !!}
        @endif

      </div>
      <div class="">
        <sup>1</sup>SC:{!! Form::text('sc', null, array('size' => '4', 'width' => '3')) !!}
      </div>
    </center>
  </div>
  <div class="col-md-3">
    <center>
      <h5>Data: {{ date('d/m/Y') }}</h5>
      Nº PCDP:{!! Form::text('pcdp', null, array('size' => '4')) !!}
    </center>
  </div>
</div>
@if ($tela == 'edit' and $apresenta == 'apresenta')
  <hr>
  <center><h6 style="color: red"><strong>Obs.: Ordem de serviço já concluída! Somente leitura, qualquer alteração realizada neste formulário NÃO será efetivada na ordem de serviço em tela.</strong></h6></center>
  <hr>
@endif
<div class="row">
  <h5><b>1 - DETERMINAÇÃO:</b></h5>
</div>
<div class="row">
  <h6>Determino ao militar/servidor civil abaixo que realize o serviço especificado, fora da sede desta OM, nas condições seguintes: <label style="color: red; font-size: 10px">* Campos automáticos (Alterar dados no SIMS)</label></h6>
</div>
<!-- primeira linha da tabela-->
<div class="row">
  <div title="Digite seu POSTO/GRAD e NOME COMPLETO" class="col-md-7">
    <div class="input-group">
      <span class="input-group-addon" id="basic-addon1">2*</span>
      @if ($tela == 'create')
        {!! Form::input('text', 'pnome', $value = $pgrad, $attributes = ['class' => 'form-control input-sm']) !!}
      @elseif ($tela == 'edit')
        {!! Form::text('pnome',  null, array('class' => 'form-control input-sm'))!!}
      @endif
    </div>
  </div>
  <div title="Digite seu SARAM" class="col-md-2">
    <div class="input-group">
      <span class="input-group-addon" id="basic-addon1">3*</span>
      @if ($tela == 'create')
        {!! Form::input('text', 'saram', $value = $saram, $attributes = ['class' => 'form-control input-sm']) !!}
        {!! Form::input('hidden', 'pescodigo', $value = $saram) !!}
      @elseif ($tela == 'edit')
        {!! Form::text('saram', null, array('class' => 'form-control input-sm' ))!!}
      @endif
    </div>
  </div>
  <div title="Digite seu CPF" class="col-md-3">
    <div class="input-group">
      <span class="input-group-addon" id="basic-addon1">4*</span>
      @if ($tela == 'create')
        {!! Form::input('text', 'cpf', $value = $cpf, $attributes = ['class' => 'form-control input-sm']) !!}
      @elseif ($tela == 'edit')
        {!! Form::text('cpf', null, array('class' => 'form-control input-sm' ))!!}
      @endif
    </div>
  </div>
</div>
<p></p>
<!-- segunda linha da tabela-->
<div class="row">
  <div title="Digite o número do seu banco" class="col-md-2">
    <div class="input-group">
      <span class="input-group-addon" id="basic-addon1">5*</span>
      @if ($tela == 'create')
        {!! Form::input('text', 'banco', $value = $nome_banco, $attributes = ['class' => 'form-control input-sm']) !!}
      @elseif ($tela == 'edit')
        {!! Form::text('banco', null, array('class' => 'form-control input-sm' ))!!}
      @endif
    </div>
  </div>
  <div title="Digite o número de sua agência" class="col-md-2">
    <div class="input-group">
      <span class="input-group-addon" id="basic-addon1">6*</span>
      @if ($tela == 'create')
        {!! Form::input('text', 'agencia', $value = $agencia, $attributes = ['class' => 'form-control input-sm']) !!}
      @elseif ($tela == 'edit')
        {!! Form::text('agencia', null, array('class' => 'form-control input-sm' ))!!}
      @endif
    </div>
  </div>
  <div title="Digite o número de sua conta" class="col-md-2">
    <div class="input-group">
      <span class="input-group-addon" id="basic-addon1">7*</span>
      @if ($tela == 'create')
        {!! Form::input('text', 'conta', $value = $contacorrente, $attributes = ['class' => 'form-control input-sm']) !!}
      @elseif ($tela == 'edit')
        {!! Form::text('conta', null, array('class' => 'form-control input-sm' ))!!}
      @endif
    </div>
  </div>
  <div title="Digite seu email" class="col-md-3">
    <div class="input-group">
      <span class="input-group-addon" id="basic-addon1">8*</span>
      @if ($tela == 'create')
        {!! Form::input('text', 'email', $value = $pemail, $attributes = ['class' => 'form-control input-sm']) !!}
      @elseif ($tela == 'edit')
        {!! Form::text('email', null, array('class' => 'form-control input-sm', 'placeholder'=>'EMAIL:')) !!}
      @endif
    </div>
  </div>
  <div title="Digite sua data de nascimento" class="col-md-3">
    <div class="input-group">
      <span class="input-group-addon" id="basic-addon1">9*</span>
      @if ($tela == 'create')
        {!! Form::input('text', 'datanascimento', $value = date('d/m/Y', strtotime($datadenascimento)), $attributes = ['class' => 'form-control input-sm']) !!}
      @elseif ($tela == 'edit')
        {!! Form::text('datanascimento', null, array('class' => 'form-control input-sm', 'placeholder'=>'DATA DE NASCIMENTO:')) !!}
      @endif
    </div>
  </div>
</div>
<p></p>
<!-- terceira linha da tabela-->
<div class="row">
  <div title="Campo automático!" class="col-md-5">
    <div class="input-group">
      <span class="input-group-addon" id="basic-addon1">10</span>
      {!! Form::input('text', 'enquadramento', $value = 'Art. 18, do Dec. 4.307, de 19.jul.2002, e Portaria nº 1348/GC4, de 3 set 2015.', $attributes = ['class' => 'form-control input-sm', 'placeholder'=>'Art. 18, do Dec. 4.307, de 19.jul.2002, e Portaria nº 1348/GC4, de 3 set 2015.']) !!}
    </div>
  </div>
  <div title="Digite sua Identidade" class="col-md-2">
    <div class="input-group">
      <span class="input-group-addon" id="basic-addon1">11*</span>
      @if ($tela == 'create')
        {!! Form::input('text', 'identidade', $value = $identidade, $attributes = ['class' => 'form-control input-sm']) !!}
      @elseif ($tela == 'edit')
        {!! Form::text('identidade', null, array('class' => 'form-control input-sm', 'placeholder'=>'IDENTIDADE:')) !!}
      @endif

    </div>
  </div>
  <div title="Escolha sua OM" class="col-md-2">
    <div class="input-group">
      <span class="input-group-addon" id="basic-addon1">12*</span>
      @if ($tela == 'create')
        {!! Form::input('text', 'om', $value = $nome_om, $attributes = ['class' => 'form-control input-sm']) !!}
      @elseif ($tela == 'edit')
        {!! Form::text('om', null, array('class' => 'form-control input-sm', 'placeholder'=>'OM:')) !!}
      @endif
    </div>
  </div>
  <div title="Digite seu telefone para contato" class="col-md-3">
    <div class="input-group">
      <span class="input-group-addon" id="basic-addon1">13*</span>
      @if ($tela == 'create')
        {!! Form::input('text', 'telefone', $value = $ramal, $attributes = ['class' => 'form-control input-sm']) !!}
      @elseif ($tela == 'edit')
        {!! Form::text('telefone', null, array('class' => 'form-control input-sm', 'placeholder'=>'TELEFONE:')) !!}
      @endif

    </div>
  </div>
</div>
<p></p>

<!-- quarta linha da tabela-->
<div class="row">
  <div title="Informe o serviço que será realizado" class="col-md-12">
    <div class="input-group">
      <span class="input-group-addon" id="basic-addon1">14</span>
      {!! Form::text('servico', null, array('maxlength'=>'255', 'class' => 'form-control input-sm', 'placeholder'=>'SERVIÇO A REALIZAR:')) !!}
    </div>
  </div>
</div>
<p></p>

<!-- quinta linha da tabela-->
<div class="row">
  <div title="Informe os documentos que originam a missão" class="col-md-6">
    <div class="input-group">
      <span class="input-group-addon" id="basic-addon1">15</span>
      {!! Form::text('documentos', null, array('maxlength'=>'80', 'class' => 'form-control input-sm', 'placeholder'=>'DOCUMENTOS QUE ORIGINARAM A MISSÃO:')) !!}
    </div>
  </div>
  <div title="Informe o NE" class="col-md-2">
    <div class="input-group">
      <span class="input-group-addon" id="basic-addon1">16</span>
      {!! Form::text('ne', null, array('class' => 'form-control input-sm', 'placeholder'=>'NE:')) !!}
    </div>
  </div>
  <div title="Informe o preito da missão" class="col-md-4">
    <div class="input-group">
      <span class="input-group-addon" id="basic-addon1">17</span>
      {!! Form::select('em_proveito', ['placeholder'=>'MISSÃO EM PROVEITO:', 'UNIÃO'=>'UNIÃO', 'PRÓPRIO'=> 'PRÓPRIO'], null, ['class' => 'form-control input-sm']) !!}
    </div>
  </div>
</div>
<p></p>

<!-- sexta linha da tabela-->
<div class="row">
  <div title="Informe a modalidade de custeio" class="col-md-12">
    <div class="input-group">
      <span class="input-group-addon" id="basic-addon1">18</span>
      {!! Form::select('custeio', ['placeholder'=>'CUSTEIO:', 'SEM CUSTO'=>'SEM CUSTO', 'DIÁRIA'=> 'DIÁRIA', 'COMISSIONAMENTO'=>'COMISSIONAMENTO'], null, ['class' => 'form-control input-sm']) !!}
    </div>
  </div>
</div>
<p></p>
<!-- NOVO INPUT PARA TRECHOS-->
<div class="row">
  <div title="Digite os trechos aqui!" class="col-md-12">
    <div class="input-group">
      <span class="input-group-addon" id="basic-addon1">19</span>
      {!! Form::textarea('trechos', null, array('rows'=>'3', 'class' => 'form-control', 'placeholder'=>'Digite todas as informações dos trechos percorridos.&#013;Nome das cidades, data de inicío com hora e data de término da missão com hora!&#013;*Ex.: Brasília - Manaus = 20/08/2018 09:00 a 22/08/2018 21:00 ')) !!}
    </div>
  </div>
</div>
<p></p>

<div class="row">
  <div class="col-md-6">
    <div class="input-group">
      <span class="input-group-addon" id="basic-addon1">20</span>
      {!! Form::select('adicional_deslocamento', ['placeholder'=>'Informe se houve ou não adicional de deslocamento:', 'SIM'=>'SIM', 'NÃO'=> 'NÃO'], null, ['id'=>'h_d[0]', 'class' => 'form-control input-sm a'], null, ['title'=>'(§1º, do Art.20, do Dec. 4.307/2002, alterado pelo Dec.6.907/2009)']) !!}
      {!! Form::select('total_acrescimos', ['placeholder'=>'TOTAL DE ACRÉSCIMOS:', 'DIÁRIA COMPLETA'=>'DIÁRIA COMPLETA', '1/2 DIÁRIA'=> '1/2 DIÁRIA'], null, ['class' => 'form-control input-sm a', 'id'=>'total_acrescimos[0]'], null, ['title'=>'Informe se Diária completa ou 1/2 diária']) !!}
    </div>
  </div>
  <div class="col-md-6">
    <div style="border: 1px solid #D3D3D3; border-radius:3px" class="input-group">
      <span style="border: 1px solid #D3D3D3; border-radius:3px; font-size: 10px" class="input-group-addon" id="basic-addon1">21 - VALOR TOTAL (Diária + Adc. Desl.)<br><br><br>Sem custo = </span>
      {!! Form::text('valor_total', null, array('title'=>'Valor total de diárias + adicionais de deslocamento', 'class' => 'form-control input-sm a', 'placeholder'=>'R$', 'id'=>'valor_total')) !!}
      @if ($tela=='create')
        {!! Form::input('checkbox', 'ck_valor_total', $value = "Sem Custo", $attributes = ['id'=>'zc[0]', 'class' => 'form-control input-sm a']) !!}
      @else ($tela=='editando')
        @if ($diaria->ck_valor_total)
          {!! Form::input('checkbox', 'ck_valor_total', $value = "Sem Custo", $attributes = ['id'=>'zc[0]', 'class' => 'form-control input-sm a', 'checked' => 'checked']) !!}
        @else
          {!! Form::input('checkbox', 'ck_valor_total', $value = "Sem Custo", $attributes = ['id'=>'zc[0]', 'class' => 'form-control input-sm a']) !!}
        @endif
      @endif

    </div>
  </div>
</div>


<p></p>
<div class="row">
  <div title="Pagamento antecipado de diárias" class="col-md-6">
    <div style="border: 1px solid #D3D3D3; border-radius:3px" class="input-group">
      <span style="border: 1px solid #D3D3D3; border-radius:3px; font-size: 12px" class="input-group-addon" id="basic-addon1">22 - Antecipação de diária: <br> (Art.5° Decreto 5992/06)</span>
      <div style="margin-top: 6px; margin-bottom: 6px">
        &nbsp&nbsp&nbsp{!! Form::radio('ant_dir', 'SIM', null, ['id'=>'ant_dir']) !!}SIM&nbsp&nbsp&nbsp
        {!! Form::radio('ant_dir', 'NÃO', null, ['id'=>'ant_dir']) !!}NÃO <br>

      </div>
      {!! Form::text('val_ant', null, array('class' => 'form-control input-sm', 'placeholder'=>'Valor: R$')) !!}
    </div>
  </div>
  <div class="col-md-6">
    <div class="input-group">
      <span class="input-group-addon" id="basic-addon1">23</span>
      {!! Form::textarea('obs_ant', null, array('rows'=>'2', 'maxlength'=>'50', 'class' => 'form-control', 'placeholder'=>'OBSERVAÇÕES: (caso haja necessidade de informações adicionais)')) !!}
    </div>
  </div>
</div>
<p></p>
<div class="row">
  <div class="col-md-4">
    <div class="input-group">
      <span title='Informe o tipo de transporte. &#013;AE = Aéreo &#013;RD = Rodoviário &#013;VO = Veículo Oficial' style="border: 1px solid #D3D3D3; border-radius:3px" class="input-group-addon" id="basic-addon1">24 - TIPO DE TRANSP.:</span>
      &nbsp&nbsp&nbsp{!! Form::radio('tipo_transp', 'Aéreo', null, ['id'=>'tipo_transp', 'title' => 'Aéreo']) !!}AE&nbsp&nbsp&nbsp
      {!! Form::radio('tipo_transp', 'Rodoviário', null, ['id'=>'tipo_transp', 'title' => 'Rodoviário']) !!}RD&nbsp&nbsp&nbsp
      {!! Form::radio('tipo_transp', 'Veículo Oficial', null, ['id'=>'tipo_transp', 'title' => 'Veículo Oficial']) !!}VO
    </div>
  </div>
  <div class="col-md-4">
    <div class="input-group">
      <span title="Informe se faz jus a auxílio transporte" style="border: 1px solid #D3D3D3; border-radius:3px" class="input-group-addon" id="basic-addon1">25 - AUXÍLIO TRANSPORTE:&nbsp</span>
      &nbsp&nbsp&nbsp{!! Form::radio('ax_t', 'SIM', null, ['id'=>'ax_t_s']) !!}SIM&nbsp&nbsp&nbsp
      {!! Form::radio('ax_t', 'NÃO', null, ['id'=>'ax_t_n']) !!}NÃO
    </div>
  </div>
  <div class="col-md-4">
    <div class="input-group">
      <span title="Informe se faz jus a auxílio alimentação" style="border: 1px solid #D3D3D3; border-radius:3px" class="input-group-addon" id="basic-addon1">26 - AUXÍLIO ALIMENTAÇÃO:</span>
      &nbsp&nbsp&nbsp{!! Form::radio('ax_a', 'SIM', null, ['id'=>'ax_a_s']) !!}SIM&nbsp&nbsp&nbsp
      {!! Form::radio('ax_a', 'NÃO', null, ['id'=>'ax_a_n']) !!}NÃO
    </div>
  </div>
</div>

<div class="row" >
  <div class="col-md-4 col-md-offset-4" id="val_t" >
      <div class="input-group">
        <span class="input-group-addon" id="basic-addon1">Valor:</span>
        {!! Form::text('val_transp', null, array('class' => 'form-control input-sm', 'placeholder'=>'Digite o valor do Aux. Transporte')) !!}
      </div>
  </div>
  <div id="val_a" >
      <div class="input-group">
        <span class="input-group-addon" id="basic-addon1">Valor:</span>
        {!! Form::text('val_alim', null, array('class' => 'form-control input-sm', 'placeholder'=>'Digite o valor do Aux. Alimentação')) !!}
      </div>
  </div>
</div>
<br>
<div class="row">
  <label style="color: red">* As justificativas possuem o limite de 100 caracteres para preenchimento!</label>
</div>
<!-- nona linha da tabela-->
<div class="row">
  <div title="JUSTIFICATIVA DA MISSÃO EM FINAL DE SEMANA / FERIADO: (§ 2º, Art. 5º, do Dec. 5.992/2006)" class="col-md-12">
    <div class="input-group">
      <span class="input-group-addon" id="basic-addon1">27</span>
      {!! Form::textarea('fim_semana', null, array('maxlength'=>'100','rows'=>'3', 'class' => 'form-control', 'placeholder'=>'JUSTIFICATIVA DA MISSÃO EM FINAL DE SEMANA / FERIADO: (§ 2º, Art. 5º, do Dec. 5.992/2006)')) !!}
    </div>
  </div>
</div>
<p></p>
<!-- decima linha da tabela-->
<div class="row">
  <div title="JUSTIFICATIVA DA CONVENIÊNCIA DO SERVIÇO: (Inciso 2.1.3, da ICA 177-42)" class="col-md-12">
    <div class="input-group">
      <span class="input-group-addon" id="basic-addon1">28</span>
      {!! Form::textarea('conveniencia_servico', null, array('maxlength'=>'100', 'rows'=>'3', 'class' => 'form-control', 'placeholder'=>'JUSTIFICATIVA DA CONVENIÊNCIA DO SERVIÇO: (Inciso 2.1.3, da ICA 177-42) - 100 caracteres')) !!}
    </div>
  </div>
</div>
<p></p>
<!-- decima primeira linha da tabela-->
<div class="row">
  <div title="JUSTIFICATIVA: (Art 1º, da Portaria 1348/GC4/2015)" class="col-md-12">
    <div class="input-group">
      <span class="input-group-addon" id="basic-addon1">29</span>
      {!! Form::textarea('justificativa', null, array('maxlength'=>'100', 'rows'=>'3', 'class' => 'form-control', 'placeholder'=>'JUSTIFICATIVA: (Art 1º, da Portaria 1348/GC4/2015)')) !!}
    </div>
  </div>
</div>
<p></p>

<div class="row">
  <div title="Informe o nome do Chefe Imediato para autorização" class="col-md-12">
    <div class="input-group">
      @if ($tela=='create')
        {!! Form::open(['method'=> 'GET',
          'action'=>'DashboardController@create']) !!}
          {!! Form::label('chefe_im', 'Selecione o seu chefe imediato para autorização:') !!}
          {!! Form::select('chefe_im', $select, null, ['class'=>'form-control']) !!}
          <label style="color: red">*Lista de oficiais cadastrados no SIMS</label>
        @elseif ($tela == 'edit')
          <strong>Chefe imediato para aprovação: <br>
            SARAM</strong> {{ $diaria->chefe_im }} <br>
            <strong>Nome: </strong>{{ $posto_chefe }} {{ $nome_chefe }} <br>

            @if ($diaria->ok_chefe_im == 'a')
              <h5 style="color: red"><strong>AGUARDANDO AUTORIZAÇÃO DO CHEFE IMEDIATO!</strong></h5>
              <strong>Alterar Chefe imediato?</strong>
              {!! Form::radio('alt_chefe_im', 'SIM', null, ['id'=>'alt_chefe_im_s']) !!}SIM&nbsp&nbsp&nbsp
              {!! Form::radio('alt_chefe_im', 'NÃO', null, ['id'=>'alt_chefe_im_n', 'checked'=>'checked']) !!}NÃO
              <br>
              <div class="col-md-12" id="alt_chefe">
                {!! Form::open(['method'=> 'GET',
                  'action'=>'DashboardController@create']) !!}
                  {!! Form::label('chefe_im', 'Selecione o seu chefe imediato para autorização:') !!}
                  {!! Form::select('chefe_im', $select, null, ['class'=>'form-control']) !!}

                  <label style="color: red">*Lista de oficiais cadastrados no SIMS</label>
                </div>
              @elseif ($diaria->ok_chefe_im == 'n')
                <h5 style="color: red"><strong>NÃO AUTORIZADO PELO CHEFE IMEDIATO!</strong></h5>
              @elseif ($diaria->ok_chefe_im == 'y')
                <h5 style="color: red"><strong>VERIFICADO E APROVADO PELO CHEFE IMEDIATO!</strong></h5>
              @endif
              @if ($diaria->chefe_im == $don)
                <strong>AUTORIZAÇÃO</strong>
                {!! Form::radio('ok_chefe_im', 'y', null, ['id'=>'ok_chefe_im_s']) !!}SIM&nbsp&nbsp&nbsp
                {!! Form::radio('ok_chefe_im', 'n', null, ['id'=>'ok_chefe_im_n']) !!}NÃO
              @endif
            @endif

          </div>
        </div>
      </div>
      <hr>

      <!-- ##########################  SEGUNDA SEÇÃO DA FICHA #############################################-->
      <!-- na tela de criação não aparece a FACD e nem HOMOLOGAÇÃO e na tela de edição não aparece a HOMOLOGAÇÃO. A HOMOLOGAÇÃO só aparece para o administrador -->
      <!-- decima TERCEIRA linha da tabela-->

      <div class="facd">
        <div class="row">
          <h5><b>II - <sup>32</sup>FICHA DE APRESENTAÇÃO DE CONCESSÃO DE DIÁRIAS (FACD):</b></h5>
        </div>
        <p></p>
        <div class="row">
          <div style="border: 1px solid #D3D3D3; border-radius:3px" class="col-md-12">
            <div class="col-md-10">
              <label style="font-size: 10.5px">OCORRERAM, POR MOTIVO DE FORÇA MAIOR, ALTERAÇÕES NO LOCAL DE REALIZAÇÃO DO SERVIÇO E/OU NAS DATAS DE INÍCIO/RETORNO AUTORIZADOS INICIALMENTE?</label>
            </div>
            <div style="font-size: 10px" class="col-md-2">
              <center>
                {!! Form::radio('alteracao_servico', 'SIM', null, ['id'=>'alteracao_servico_s']) !!}SIM&nbsp&nbsp&nbsp
                {!! Form::radio('alteracao_servico', 'NÃO', null, ['id'=>'alteracao_servico_n']) !!}NÃO
              </center>
            </div>
          </div>
          <!-- DIV abaixo só aparece se o radio (de cima) SIM for selecionado (jquery escrita no template) -->
          <div class="col-md-12" id="camposExtras">
            {!! Form::textarea('justificativa_alteracao', null, array('maxlength'=>'100', 'rows'=>'3', 'class' => 'form-control', 'placeholder'=>'JUSTIFICATIVA:')) !!}
            <h5>Campo Grande, {!! Form::text('dia', null, array('size'=>'3')) !!} &nbsp de &nbsp {!! Form::text('mes', null,array('size' => '15')) !!}&nbsp de <?php echo date('Y');?>. Responsável pelo serviço: {!! Form::text('responsavel', null,array('size' => '20')) !!} </h5>
          </div>
        </div>
      </div>
      <hr>
      <label style="color: red">* NÃO utilizar "vírgula" em campos numéricos, somente "ponto"! - Ex.: 1550.30 </label>
      <div style="border: 1px solid #D3D3D3; border-radius:3px" class="row">
        <center><h5><b>CÔMPUTO DE DIÁRIAS E ACRÉSCIMOS - POR LOCALIDADE</b></h5></center>
      </div>
      <!-- IDENTIFICAÇÃO DOS CAMPOS DA TABELA-->
      <div style="border: 1px solid #D3D3D3; border-radius:3px" class="row">
        <div class="col-md-2">
          <center><b>Valor</b></center>
        </div>
        <div class="col-md-6">
          <center><b>Cidades</b></center>
        </div>
        <div class="col-md-2">
          <center><b>Quantidade</b></center>
        </div>
        <div class="col-md-2">
          <center><b>Subtotal</b></center>
        </div>
      </div>
      <div style="border: 1px solid #D3D3D3; border-radius:3px"  class="row">
        <!-- PRIMEIRA LINHA DA TABELA-->
        <div class="row">
          <div class="col-md-2">
            <center>{!! Form::text('val_br_am_rj', null, array('size'=>'6', 'id'=>'a')) !!}</center>
          </div>
          <div class="col-md-6">
            <center><h6>Brasília, Manaus, Rio de Janeiro</h6></center>
          </div>
          <div class="col-md-2">
            <center>{!! Form::text('qt_br_am_rj', null, array('size'=>'6', 'id'=>'a1', 'onblur'=>'calcular_total()')) !!} </center>
          </div>
          <div class="col-md-2">
            <center>{!! Form::text('resultado1', null, array('size'=>'6', 'id'=>'resultado1', 'onblur'=>'calcular()')) !!}</center>
          </div>
        </div>
        <!-- SEGUNDA LINHA DA TABELA-->
        <div class="row">
          <div class="col-md-2">
            <center>{!! Form::text('val_bh_fl_pa_rc_sl_sp', null, array('size'=>'6', 'id'=>'b')) !!}</center>
          </div>
          <div class="col-md-6">
            <center><h6>Belo Horizonte, Fortaleza, Porto Alegre, Recife, Salvador e São Paulo</h6></center>
          </div>
          <div class="col-md-2">
            <center>{!! Form::text('qt_bh_fl_pa_rc_sl_sp', null, array('size'=>'6', 'id'=>'b1', 'onblur'=>'calcular_total()')) !!}</center>
          </div>
          <div class="col-md-2">
            <center>{!! Form::text('resultado2', null, array('size'=>'6', 'id'=>'resultado2', 'onblur'=>'calcular()')) !!}</center>
          </div>
        </div>
        <!-- TERCEIRA LINHA DA TABELA-->
        <div class="row">
          <div class="col-md-2">
            <center>{!! Form::text('val_capitais', null, array('size'=>'6', 'id'=>'c')) !!}</center>
          </div>
          <div class="col-md-6">
            <center><h6>Demais capitais de Estado</h6></center>
          </div>
          <div class="col-md-2">
            <center>{!! Form::text('qt_capitais', null, array('size'=>'6', 'id'=>'c1', 'onblur'=>'calcular_total()')) !!}</center>
          </div>
          <div class="col-md-2">
            <center>{!! Form::text('resultado3', null, array('size'=>'6', 'id'=>'resultado3', 'onblur'=>'calcular()')) !!}</center>
          </div>
        </div>
        <!-- QUARTA LINHA DA TABELA-->
        <div class="row">
          <div class="col-md-2">
            <center>{!! Form::text('val_cidades', null, array('size'=>'6', 'id'=>'d')) !!}</center>
          </div>
          <div class="col-md-6">
            <center><h6>Demais Cidades</h6></center>
          </div>
          <div class="col-md-2">
            <center>{!! Form::text('qt_cidades', null, array('size'=>'6', 'id'=>'d1', 'onblur'=>'calcular_total()')) !!}</center>
          </div>
          <div class="col-md-2">
            <center>{!! Form::text('resultado4', null, array('size'=>'6', 'id'=>'resultado4', 'onblur'=>'calcular()')) !!}</center>
          </div>
        </div>
        <div class="row">
          <div class="col-md-2 col-md-offset-10">
            <center>Total: {!! Form::text('subtotal', null, array('size'=>'6', 'id'=>'subtotal' )) !!}</center>
          </div>
        </div>
        <!-- LINHA DE ACRÉSCIMOS-->
        <hr>
        <div class="row">
          <div class="col-md-8">
            <center><h6><b>Acréscimos de Deslocamento</b></h6></center>
          </div>
          <div class="col-md-2">
            <center>{!! Form::input('text', 'qt_acrescimo', null, $attributes = ['id'=>'qt_acrescimo', 'size'=>'6']) !!} </center>
          </div>
          <div class="col-md-2">
            <center>{!! Form::input('text', 'val_ac', null, $attributes = ['id'=>'val_ac','size'=>'6', 'onblur'=>'calcular_total()']) !!}</center>
          </div>
        </div>
        <!-- LINHA DE DESCONTOS-->
        <hr>
        <div class="row">
          <div class="col-md-2">
            <center><b>Valor Diário</b></center>
          </div>
          <div class="col-md-6">
            <center><b>Cômputo de Descontos</b></center>
          </div>
          <div class="col-md-2">
            <center><b>Dias Úteis</b></center>
          </div>
          <div class="col-md-2">
            <center><b>Subtotal</b></center>
          </div>
        </div>
        <!-- PRIMEIRA LINHA DESCONTO-->
        <div class="row">
          <div class="col-md-2">
            <center>{!! Form::text('desc_a', null, array('size'=>'6', 'id'=>'desc_a')) !!}</center>
          </div>
          <div class="col-md-6">
            <center><h6>Auxílio Alimentação - Valor líquido mensal: R$ 0</h6></center>
          </div>
          <div class="col-md-2">
            <center>{!! Form::text('qt_dias_a', null, array('size'=>'6', 'id'=>'qt_dias_a')) !!}</center>
          </div>
          <div class="col-md-2">
            <center>{!! Form::text('resultado_dias_a', null, array('size'=>'6', 'id'=>'resultado_dias_a', 'onblur'=>'calcular_total()')) !!}</center>
          </div>
        </div>
        <!-- SEGUNDA LINHA DESCONTO-->
        <div class="row">
          <div class="col-md-2">
            <center>{!! Form::text('desc_b', null, array('size'=>'6', 'id'=>'desc_b')) !!}</center>
          </div>
          <div class="col-md-6">
            <center><h6>Auxílio Transporte - Valor líquido mensal: R$ 0</h6></center>
          </div>
          <div class="col-md-2">
            <center>{!! Form::text('qt_dias_b', null, array('size'=>'6', 'id'=>'qt_dias_b')) !!}</center>
          </div>
          <div class="col-md-2">
            <center>{!! Form::text('resultado_dias_b', null, array('size'=>'6', 'id'=>'resultado_dias_b', 'onblur'=>'calcular_total()')) !!}</center>
          </div>
        </div>
        <hr>
        <h4>Número de diárias completas computadas: {!! Form::text('qtn_dc', null, array('size'=>'6', 'id'=>'qtn_dc')) !!}</h4>
        <h4>Número de 1/2 diárias computadas: {!! Form::text('qtn_md', null, array('size'=>'6', 'id'=>'qtn_md')) !!}</h4>
        <div class="row">
          <div class="col-md-2 col-md-offset-10">
            <button type="button" name="limpar_diarias" onclick="limpa_diarias()">Limpar</button>
          </div>
        </div>
        <hr>
        <div class="row">
          <div class="col-md-4">
            &nbsp&nbspPublique-se: <br> &nbsp&nbspCampo Grande/MS, {{ date('d/m/Y') }}
          </div>
          <div class="col-md-4">
            <center><p> ________________________________________ </p></center>
            <center><p>ORDENADOR DE DESPESAS</p></center>
          </div>
          <div class="col-md-2">
            <center><b>TOTAL</b></center>
          </div>
          <div class="col-md-2">
            <center>{!! Form::text('resultado_total', null, array('size'=>'6', 'id'=>'resultado_total')) !!}</center>
          </div>
        </div>
      </div>



      <!--HOMOLOGAÇÃO SOMENTE PARA ADMINISTRADOR-->

      <div class="homologa">
        <div class="col-md-12">
          <div class="row">
            <h5><b>III - <sup>33</sup>HOMOLOGAÇÃO:</b></h5>
          </div>
        </div>
        <br>
        <div class="col-md-offset-2">
          <div class="row">
            <br>
            <p>a) Homologo a concessão de diárias</p>
          </div>
          @if ($tela == 'create')
            <div class="row">
              <p>b) 1. {!! Form::checkbox('conforme_previsto', 'Conforme previsto na presente Ordem de Serviço', false) !!} Conforme previsto na presente Ordem de Serviço</p>
            </div>
            <div class="row">
              <p>2. {!! Form::checkbox('conforme_forca_maior', 'Conforme a seguir, por motivo de força maior',  false) !!} Conforme a seguir, por motivo de força maior.</p>
            </div>
            @else
              <div class="row">
                <p>b) 1. {!! Form::checkbox('conforme_previsto', 'Conforme previsto na presente Ordem de Serviço') !!} Conforme previsto na presente Ordem de Serviço</p>
              </div>
              <div class="row">
                <p>2. {!! Form::checkbox('conforme_forca_maior', 'Conforme a seguir, por motivo de força maior') !!} Conforme a seguir, por motivo de força maior.</p>
              </div>
          @endif

          <div class="row">
            <p>1/2 diária - Qtd: {!! Form::text('qt_meia_diaria', null, array('size'=>'3', 'id'=>'qt_meia_diaria')) !!} referente a localidade de {!! Form::text('localidade_meia_diaria', null, array('size'=>'25')) !!}</p>
          </div>
          <div class="row">
            <p>Diária Completa - {!! Form::text('qt_diaria_completa', null, array('size'=>'3', 'id'=>'qt_diaria_completa')) !!} referente a pernoite(s) em {!! Form::text('localidade_diaria_completa', null, array('size'=>'45')) !!}</p>
          </div>
          <div class="row">
            <p>Número total de acréscimos: {!! Form::text('num_total_acrescimos', null, array('size'=>'3', 'id'=>'num_total_acrescimos')) !!}</p>
          </div>
          <div class="row">
            3. Restituição a efetuar:&nbsp&nbsp&nbsp&nbsp
            <div class="radio-inline">
              {!! Form::radio('restituicao', 'SIM') !!}SIM&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp
              {!! Form::radio('restituicao', 'NÃO') !!}NÃO&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp
            </div>
            Valor: R$ {!! Form::text('valor_restituicao', null, array('size'=>'15', 'id'=>'valor_restituicao')) !!}
          </div>
          <div class="row">
            <br><br>
            <p>Publique-se:____________________________________________________________</p>
            <br>
          </div>

        </div>
        @php
        $d1 = Session::get('pescodigo');
        $dono = Session::get('dono');
        $administrador = Session::get('administrador');
        @endphp
        @if ($administrador and $tela != 'create')
          <h6 style="color: red">OS concluída?</h6>
          <div class="radio-inline">
            {!! Form::radio('concluido', 'SIM') !!}SIM&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp
            {!! Form::radio('concluido', 'NÃO') !!}NÃO&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp
          </div>
          <br><br>
          <strong>Obs.: O solicitante NÃO poderá editar ou excluir a OS após a conclusão da mesma!:</strong> &nbsp&nbsp&nbsp&nbsp
        @endif
@if ($url_adm)
  <input type="hidden" name="caminho" value="{{ $url_adm}}">
@endif

      </div>
      <br>
      @if ($tela == 'edit' and $apresenta == 'apresenta')
        <h6 style="color: red"><strong>Obs.: Ordem de serviço já concluída! Somente leitura, qualquer alteração realizada neste formulário NÃO será efetivada na ordem de serviço em tela.</strong></h6>
      @else
        @if ($tela == 'create')
          <input type="hidden" name="concluido" value="NÃO">
          <input type="hidden" name="ok_chefe_im" value="a">

        @endif
        <input type="submit" name="envia" id="sub" value="Salvar" class="btn btn-primary">
        {{ Form::reset('Limpar', array('class'=>'btn btn-danger')) }}
      @endif
      @if ($url_adm)
          {{ $url_adm }}
      @endif
