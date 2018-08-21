<!DOCTYPE html>
<html>
<head>
  <meta charset="utf-8">
  <title>@yield('title')</title>
  <script src="/bst/js/jquery.min.js"></script>
  <link href="/css/impressao.css" rel="stylesheet">
</head>
<body>
  @php
  $tela = 'print';
  $om = $diaria->om;
  $numero_os = $diaria->id;
  $ck_semcusto = $diaria->ck_valor_total;
  @endphp
<div class="imprimir" id="imprimir">
<div id="folha-a4" class="folha a4_vertical">

  <div class="topo">
    <div class="brasao">
      <img src="/bst/brasao.png" class="img-responsive" alt="" height="90em" width="80em" />
    </div>
    <div class="cabecalho">
      <br>
      <center><label style="font-size: 16px">COMANDO DA AERONÁUTICA</label></center>
      <center><label style="font-size: 14px">GRUPAMENTO DE APOIO DE CAMPO GRANDE</label></center>
      <center><label style="font-size: 14px">ORDEM DE SERVIÇO DE SOLICITAÇÃO DE DIÁRIAS Nº {{ $diaria->id }}</label></center>
      <center><label style="font-size: 16px"><sup>1</sup>SC:{{ $diaria->sc }}</label></center>
    </div>
    <div class="pcdp">
      <center><label style="font-size: 12px">Data de Criação: {{ date('d/m/Y H:m:s', strtotime($diaria->created_at)) }}</label></center>
      <center><label style="font-size: 12px">Data de Edição: {{ date('d/m/Y H:m:s', strtotime($diaria->updated_at)) }}</label></center>
      <center><label style="font-size: 14px">Nº PCDP:{{ $diaria->pcdp }}</label></center>
    </div>
    <br>
  </div>
  <hr>
  <div class="tudo">
    <div class="1">
      I - DETERMINAÇÃO:<br>
      &nbsp&nbsp&nbsp&nbsp&nbsp&nbspDetermino ao militar/servidor civil abaixo que realize o serviço especificado,fora de sede desta OM, nas condições seguintes:
    </div>
    <div class="tabela1">
      <div class="c2">
        <sup>2</sup> POSTO/GRAD/NOME: <br>{{ $diaria->pnome }}
      </div>
      <div class="c3">
        <sup>3</sup> SARAM:<br> {{ $diaria->saram }}
      </div>
      <div class="c4">
        <sup>4</sup> CPF:<br> {{ $diaria->cpf }}
      </div>
    </div> <!--div da tb 1-->

    <div class="tabela2">
      <div class="c5">
        <sup>5</sup> BANCO: <br> {{ $diaria->banco }}
      </div>
      <div class="c6">
        <sup>6</sup> AGÊNCIA: <br> {{ $diaria->agencia }}
      </div>
      <div class="c7">
        <sup>7</sup> CONTA: <br> {{ $diaria->conta }}
      </div>
      <div class="c8">
        <sup>8</sup> EMAIL: <br> {{ $diaria->email }}
      </div>
      <div class="c9">
        <sup>9</sup> DATA NASCIMENTO:  <br> {{ $diaria->datanascimento }}
      </div>
    </div>
    <div class="tabela3">
      <div class="c10">
        <sup>10</sup> ENQUADRAMENTO LEGAL: <br> {{ $diaria->enquadramento }}
      </div>
      <div class="c11">
        <sup>11</sup> IDENTIDADE: <br> {{ $diaria->identidade }}
      </div>
      <div class="c12">
        <sup>12</sup> OM: <br> {{ $diaria->om }}
      </div>
      <div class="c13">
        <sup>13</sup> TELEFONE: <br> {{ $diaria->telefone }}
      </div>
    </div>
    <div class="tabela4">
      <sup>14</sup> SERVIÇO A REALIZAR: <br> {{ $diaria->servico }}
    </div>
    <div class="tabela5">
      <div class="c15">
        <sup>15</sup> DOCS QUE ORIGINARAM A MISSÃO: <br> {{ $diaria->documentos }}
      </div>
      <div class="c16">
        <sup>16</sup> NE: <br> {{ $diaria->ne }}
      </div>
      <div class="c17">
        <sup>17</sup> MISSÃO EM PROVEITO: <br> {{ $diaria->em_proveito }}
      </div>
    </div>
    <div class="tabela6">
      <sup>18</sup> CUSTEIO: <br> {{ $diaria->custeio }}
    </div>
    <div class="tabela7">
      <sup>19</sup> LOCAL DE REALIZAÇÃO DO SERVIÇO: <br> {{ $diaria->local_servico }}
    </div>
    <div class="tabela8">
      <sup>20</sup> LOCAL(IS) DE PERNOITE: <br> {{ $diaria->local_pernoite }}
    </div>
    <!--
    <div class="tabela9">
      <sup>21</sup> AFASTAMENTO DE SEDE: <br> INÍCIO: {{ $diaria->data_afastamento_inicio }} às {{ $diaria->hora_afastamento_inicio}} | RETORNO: {{ $diaria->data_afastamento_retorno }} às {{ $diaria->hora_afastamento_retorno}}
    </div>
    <div class="tabela10">
      <div class="c22">
        <sup>22</sup> ADICIONAL DE DESLOCAMENTO (§ 1º, do Art. 20, do Dec. 4.307/2002, alterado pelo Dec. 6.907/2009): <br> {{ $diaria->adicional_deslocamento }} <br>
        TOTAL DE ACRÉSCIMOS: &nbsp {{ $diaria->total_acrescimos }}
      </div>
      <div class="c23">
        <sup>23</sup> VALOR TOTAL: (DIÁRIA+ADC.DESLOCAMENTO): <br> @if ( $ck_semcusto == 'Sem Custo' )
          {{ $diaria->ck_valor_total }}
          @else
            {{ $diaria->valor_total }}
        @endif
      </div>
    </div>
-->

  </div><!--div "tudo"-->
  <!-- CAMPOS PARA ASSINATURAS (SOMENTE NA PÁGINA DE IMPRESSÃO) -->

  <!-- decima segunda linha da tabela- ASSINATURAS
  Se SARAM do GAP-CG a assinatura é do CHEFE DIVISÃO e CHEFE GAP-CG e se ALA5 a assinatura
  é do CMT ESQUADRÃO/CHEM e COMANDANTE DA BACG (NÚCLEO DE ALA 5)
-->
<!--descomentar para assinaturas-->
<!--
@if ($om == 'GAP-CG' )
  <div class="proponho">
    <p>29 - PROPONHO:</p>
    <center><p> ________________________________________ </p></center>
    <center><p>CHEFE DE DIVISÃO</p></center>
  </div>
conteudo
  <div class="autorizo">
    <p>30 - AUTORIZO:</p>
    <center><p> ________________________________________ </p></center>
    <center><p>CHEFE DO GAP-CG</p></center>
  </div>

@elseif ($om == 'ALA5')
  <div class="row">
    <div class="col-md-6">
      <div class="input-group">
        <span style="border: 1px solid #D3D3D3; border-radius:3px" class="input-group-addon" id="basic-addon1">29 - PROPONHO:</span>
        <br><br> <center><p> ________________________________________ </p></center>
        <center><p>CMT ESQUADRÃO/CHEM</p></center>
      </div>
    </div>
    <div class="col-md-6">
      <div class="input-group">
        <span style="border: 1px solid #D3D3D3; border-radius:3px" class="input-group-addon" id="basic-addon1">30 - AUTORIZO:</span>
        <br><br> <center><p> ________________________________________ </p></center>
        <center><p>COMANDANTE DA ALA5</p></center>
      </div>
    </div>
  </div>
@elseif (empty($om))
  Assinaturas na tela de impressão!
@endif
-->
</div>
</div>
<button class="btn btn-primary" type="button" name="button" onclick="window.print();">Imprimir</button>
</body>
<script>
  $( document ).ready(function() {
      window.print();
      history.back();
  });
</script>
</html>
