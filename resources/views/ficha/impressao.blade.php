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
          <img src="/bst/brasao.png" class="img-responsive" alt="" height="80em" width="70em" />
        </div>
        <div class="cabecalho">
          <br>
          <center><label style="font-size: 15px">COMANDO DA AERONÁUTICA</label></center>
          <center><label style="font-size: 13px">GRUPAMENTO DE APOIO DE CAMPO GRANDE</label></center>
          <center><label style="font-size: 13px">ORDEM DE SERVIÇO DE SOLICITAÇÃO DE DIÁRIAS Nº {{ $diaria->id }}</label></center>
          <center><label style="font-size: 15px"><sup>1</sup>SC:{{ $diaria->sc }}</label></center>
        </div>
        <div class="pcdp">
          <center><label style="font-size: 11px">Data de Criação: {{ date('d/m/Y H:m:s', strtotime($diaria->created_at)) }}</label></center>
          <center><label style="font-size: 11px">Data de Edição: {{ date('d/m/Y H:m:s', strtotime($diaria->updated_at)) }}</label></center>
          <center><label style="font-size: 13px; background-color: gray">Nº PCDP:{{ $diaria->pcdp }}</label></center>
        </div>
        <br><br><br>
      </div>

      <div class="tudo">
        <div class="1">
          I - DETERMINAÇÃO:<br>
          &nbsp&nbsp&nbsp&nbsp&nbsp&nbspDetermino ao militar/servidor civil abaixo que realize o serviço especificado,fora de sede desta OM, nas condições seguintes:
        </div>
        <div class="tabela1">
          <div class="c2">
            <sup>2</sup> <strong>POSTO/GRAD/NOME:</strong> <br>{{ $diaria->pnome }}
          </div>
          <div class="c3">
            <sup>3</sup> <strong>SARAM:</strong><br> {{ $diaria->saram }}
          </div>
          <div class="c4">
            <sup>4</sup><strong>CPF:</strong><br> {{ $diaria->cpf }}
          </div>
        </div> <!--div da tb 1-->

        <div class="tabela2">
          <div class="c5">
            <sup>5</sup> <strong>BANCO:</strong> <br> {{ $diaria->banco }}
          </div>
          <div class="c6">
            <sup>6</sup> <strong>AGÊNCIA:</strong> <br> {{ $diaria->agencia }}
          </div>
          <div class="c7">
            <sup>7</sup> <strong>CONTA:</strong> <br> {{ $diaria->conta }}
          </div>
          <div class="c8">
            <sup>8</sup><strong>EMAIL:</strong> <br> {{ $diaria->email }}
          </div>
          <div class="c9">
            <sup>9</sup> <strong>DATA NASCIMENTO:</strong>  <br> {{ $diaria->datanascimento }}
          </div>
        </div>
        <div class="tabela3">
          <div class="c10">
            <sup>10</sup> <strong>ENQUADRAMENTO LEGAL:</strong> <br> {{ $diaria->enquadramento }}
          </div>
          <div class="c11">
            <sup>11</sup> <strong>IDENTIDADE:</strong> <br> {{ $diaria->identidade }}
          </div>
          <div class="c12">
            <sup>12</sup> <strong>OM:</strong> <br> {{ $diaria->om }}
          </div>
          <div class="c13">
            <sup>13</sup> <strong>TELEFONE:</strong> <br> {{ $diaria->telefone }}
          </div>
        </div>
        <div class="tabela4">
          <sup>14</sup> <strong>SERVIÇO A REALIZAR:</strong> <br> {{ $diaria->servico }}
        </div>
        <div class="tabela5">
          <div class="c15">
            <sup>15</sup> <strong>DOCS QUE ORIGINARAM A MISSÃO:</strong> <br> {{ $diaria->documentos }}
          </div>
          <div class="c16">
            <sup>16</sup> <strong>NE:</strong> <br> {{ $diaria->ne }}
          </div>
          <div class="c17">
            <sup>17</sup> <strong>MISSÃO EM PROVEITO:</strong> <br> {{ $diaria->em_proveito }}
          </div>
        </div>
        <div class="tabela6">
          <sup>18</sup> <strong>CUSTEIO:</strong> <br> {{ $diaria->custeio }}
        </div>
        <div class="tabela7">
          <sup>19</sup> <strong>LOCAL DE REALIZAÇÃO DO SERVIÇO:</strong> <br> {{ $diaria->trechos }}
        </div>
        <div class="tabela8">
          <div class="c18">
            <sup>20</sup> <strong>ADICIONAL DE DESLOCAMENTO: <br><label style="font-size: 10px">(A§ 1.º do Art. 20 do Decreto n.º 4.307/2002, alterado pelo Decreto n.º 6.907/2009):</label></strong>&nbsp&nbsp&nbsp{{ $diaria->adicional_deslocamento }}
          </div>
          <div class="c19">
            <sup>21</sup> <strong>VALOR TOTAL: (DIÁRIA+ADC.DESL.):</strong> <br>{{ $diaria->valor_total }} - {{ $diaria->ck_valor_total }}
          </div>
        </div>
        <div class="tabela9">
          <div class="c20">
            <sup>22</sup> <strong>TIPO DE TRANSPORTE:</strong> <br> {{ $diaria->tipo_transp }}
          </div>
          <div class="c21">
            <sup>23</sup> <strong>AUX. TRANSPORTE:</strong> <br>{{ $diaria->ax_t }}
          </div>
          <div class="c22">
            <sup>24</sup> <strong>AUX. ALIMENTAÇÃO:</strong> <br>{{ $diaria->ax_a }}
          </div>
        </div>
        <div class="tabela10">
          <div class="c23">
            <sup>25</sup> <strong>JUSTIFICATIVA DA MISSÃO EM FINAL DE SEMANA/FERIADO, DE ACORDO COM O ART. 5º, §2º DO DECRETO Nº 5.992:</strong> <br> {{ $diaria->fim_semana }}
          </div>
        </div>
        <div class="tabela11">
          <div class="c24">
            <sup>26</sup> <strong>JUSTIFICATIVA DA CONVENIÊNCIA DO SERVIÇO: (Inciso 2.1.3, da ICA 177-42)</strong> <br> {{ $diaria->conveniencia_servico }}
          </div>
        </div>
        <div class="tabela12">
          <div class="c25">
            <sup>27</sup> <strong>JUSTIFICATIVA: (Art 1º, da Portaria 1348/GC4/2015)</strong> <br> {{ $diaria->justificativa }}
          </div>
        </div>

        <!--ASSINATURAS-->
        <div class="tabela_ass">
          @if ($om == 'GAP-CG' )
            <div class="proponho">
              28 - PROPONHO:<br><br>
              <center> ________________________________________</center>
              <center>CHEFE DA DIVISÃO</center>
            </div>
            <div class="autorizo">
              29 - AUTORIZO:<br><br>
              <center>________________________________________ </center>
              <center>Valdinei Fagundes de Souza - Maj Int.</center>
              <center style="margin-left: 27em">CHEFE DO GAP-CG</center><br>
            </div>
          @elseif ($om == 'ALA 5')
            <div class="proponho">
              28 - PROPONHO:<br><br>
              <center> ________________________________________</center>
              <center>CMT EC</center>
            </div>
            <div class="autorizo">
              29 - AUTORIZO:<br><br>
              <center>________________________________________ </center>
              <center>Augusto Cesar Abreu dos Santos - Brig Ar.</center>
              <center style="margin-left: 27em">COMANDANTE DA ALA-5</center><br>
            </div>
          @else
            <div class="proponho">
              28 - PROPONHO:<br><br>
              <center> ________________________________________</center>
              <center>CMT EC</center>
            </div>
            <div class="autorizo">
              29 - AUTORIZO:<br>
              <center>________________________________________ </center>
              <center>COMANDANTE DA ALA-5</center><br>
            </div>
          @endif
        </div>
        <!--TÉRMINO ASSINATURAS-->

        <div class="1">
          <div class="row">
            II - <sup>31</sup>FICHA DE APRESENTAÇÃO DE CONCESSÃO DE DIÁRIAS (FACD):
          </div>
        </div>
        <div class="tabela13">
          <div class="c30">
            OCORRERAM, POR MOTIVO DE FORÇA MAIOR, ALTERAÇÕES NO LOCAL DE REALIZAÇÃO DO SERVIÇO E/OU NAS DATAS DE INÍCIO/RETORNO AUTORIZADOS INICIALMENTE?
            @if ($diaria->alteracao_servico == 'NÃO')
              <strong>{{ $diaria->alteracao_servico }}</strong>
            @endif
            @if ($diaria->alteracao_servico == 'SIM')
              <br> {{ $diaria->alteracao_servico }}
              &nbsp&nbsp-&nbsp&nbsp<strong>JUSTIFICATIVA:</strong> {{ $diaria->justificativa_alteracao }}
            @endif
          </div>
        </div>
        <div class="tabela14">
          <center><strong>CÔMPUTO DE DIÁRIAS E ACRÉSCIMOS - POR LOCALIDADE</strong></center>
        </div>
        <div class="tabela15">
          <table class="tb_computos">
            <thead>
              <tr>
                <th>Valor</th>
                <th>Cidades</th>
                <th>Quantidade</th>
                <th>Subtotal</th>
              </tr>
            </thead>
            <tbody>
              @if ($diaria->qt_br_am_rj != 0)
                <tr>
                  <td>{{ $diaria->val_br_am_rj }}</td>
                  <td>Brasília, Manaus, Rio de Janeiro</td>
                  <td>{{ $diaria->qt_br_am_rj }}</td>
                  <td>{{ $diaria->resultado1 }}</td>
                </tr>
              @endif
              @if ($diaria->qt_bh_fl_pa_rc_sl_sp != 0)
                <tr>
                  <td>{{ $diaria->val_bh_fl_pa_rc_sl_sp }}</td>
                  <td>Belo Horizonte, Fortaleza, Porto Alegre, Recife, Salvador e São Paulo</td>
                  <td>{{ $diaria->qt_bh_fl_pa_rc_sl_sp }}</td>
                  <td>{{ $diaria->resultado2 }}</td>
                </tr>
              @endif
              @if ($diaria->qt_capitais != 0)
                <tr>
                  <td>{{ $diaria->val_capitais }}</td>
                  <td>Demais Capitais de Estados</td>
                  <td>{{ $diaria->qt_capitais }}</td>
                  <td>{{ $diaria->resultado3 }}</td>
                </tr>
              @endif
              @if ($diaria->qt_cidades != 0)
                <tr>
                  <td>{{ $diaria->val_cidades }}</td>
                  <td>Demais Cidades</td>
                  <td>{{ $diaria->qt_cidades }}</td>
                  <td>{{ $diaria->resultado4 }}</td>
                </tr>
              @endif

            </tbody>
          </table>

        </div>
        <div class="tabela14">
          <center><strong>ACRÉSCIMOS DE DESLOCAMENTOS:</strong> {{ $diaria->qt_acrescimo }} <strong>- Subtotal: </strong>{{ $diaria->val_ac }}</center>
        </div>
        <div class="tabela15">
          <div class="">
            <center><strong>CÔMPUTO DE DESCONTOS</strong></center>
            <strong>Valor diário:</strong> {{ $diaria->desc_a }} <strong>- AUXÍLIO ALIMENTAÇÃO - VALOR LÍQUIDO MENSAL: R$ 0 Dias úteis:</strong> {{ $diaria->qt_dias_a }}  <strong>- Subtotal:</strong> {{ $diaria->resultado_dias_a }}
          </div>
          <div class="">
            <strong>Valor diário:</strong> {{ $diaria->desc_b }} <strong>- AUXÍLIO TRANSPORTE - VALOR LÍQUIDO MENSAL: R$ 0 Dias úteis:</strong> {{ $diaria->qt_dias_b }}  <strong>- Subtotal:</strong> {{ $diaria->resultado_dias_b }}
          </div>
        </div>
        <div class="tabela17">
          <div class="c26">
            Publique-se <br> Campo Grande/MS<br> <span style="font-size: 16px"> {{ date('d/m/Y') }}</span>
          </div>
          <div class="c27">
            <br>
            &nbsp________________________________________
            <center>Valdinei Fagundes de Souza - Maj Int.</center>
            <center>ORDENADOR DE DESPESAS</center>
          </div>
          <div class="c28">
            <br>  <strong>TOTAL:  </strong><br> <br><strong> <span style="font-size: 16px"><center>R$ {{ $diaria->resultado_total }}</center></span> </strong>
          </div>
        </div>


        III - <sup>32</sup>HOMOLOGAÇÃO:

        <div class="homologacao">
          <div class="" style="margin-left: 30px">
            a) Homologo a concessão de diárias <br>
            b)  1.
            @if ($diaria->conforme_previsto == 'on')
              (<strong>X</strong>)
            @else
              (  )
            @endif
            Conforme previsto na presente Ordem de Serviço <br>
            &nbsp&nbsp&nbsp&nbsp 2.
            @if ($diaria->conforme_forca_maior == 'on')
              (<strong>X</strong>)
            @else
              (  )
            @endif
            Conforme a seguir, por motivo de força maior. <br>
            &nbsp&nbsp&nbsp&nbsp 1/2 diária - Qtd:
            @if ($diaria->qt_meia_diaria != 0)
              (<strong>{{ $diaria->qt_meia_diaria }}</strong>)
            @else
              ( <strong>0</strong> )
            @endif
            referente a localidade de
            @if ($diaria->localidade_meia_diaria)
              <strong>{{ $diaria->localidade_meia_diaria }}</strong><br>
            @else
              ____________________________________________ <br>
            @endif
            &nbsp&nbsp&nbsp&nbsp Diária completa - Qtd:
            @if ($diaria->qt_meia_diaria != 0)
              (<strong>{{ $diaria->qt_diaria_completa }}</strong>)
            @else
              ( <strong>0</strong> )
            @endif
            referente a pernoite(s) em
            @if ($diaria->localidade_diaria_completa)
              <strong>{{ $diaria->localidade_diaria_completa }}</strong><br>
            @else
              ____________________________________________ <br>
            @endif
            &nbsp&nbsp&nbsp&nbsp Nº total de acréscimos:
            @if ($diaria->num_total_acrescimos != 0)
              <strong>{{ $diaria->num_total_acrescimos }}</strong><br>
            @else
              ____________________________________________ <br>
            @endif
            &nbsp&nbsp&nbsp&nbsp 3. Restituição a efetuar
            @if ($diaria->restituicao)
              <strong>{{ $diaria->restituicao }}</strong>
            @endif
            Valor: <strong>R$ {{ $diaria->valor_restituicao }}</strong><br>
            c)    Publique-se: _______________________________<br>

            <div class="ordenador">
              <center>_________________________________________<br></center>
              <center>Valdinei Fagundes de Souza - Maj Int. <br></center>
              <center><sup>33</sup> ORDENADOR DE DESPESAS DO GAP-CG<br></center>
            </div>

          </div>
        </div>
      </div><!--div "tudo"-->

    </div>
  </div>
  <!--<button class="btn btn-primary" type="button" name="button" onclick="window.print();">Imprimir</button>-->
</body>
<script>
$( document ).ready(function() {
window.print();
history.back();
});
</script>
</html>
