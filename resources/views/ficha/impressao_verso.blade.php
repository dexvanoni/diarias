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
      <div class="tudo">
        <center><h6>Impressão de retorno</h6></center>
        <div class="tabela10b">
          <div class="c23">
            <sup>-</sup> <strong>NÚMERO DE DIÁRIAS COMPUTADAS: (Homologado)</strong> <br> <strong>Diárias Completas:</strong> {{ $diaria->qtn_dc }} <strong>- 1/2 Diária:</strong> {{ $diaria->qtn_md }}
          </div>
        </div>
        <div class="1">
          <div class="row">
            II - <sup>32</sup>FICHA DE APRESENTAÇÃO DE CONCESSÃO DE DIÁRIAS (FACD):
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
            <center>{{ $ordenador->nome_completo }} - {{ $ordenador->posto_grad }}</center>
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
              <center>{{ $ordenador->nome_completo }} - {{ $ordenador->posto_grad }} <br></center>
              <center><sup>33</sup> ORDENADOR DE DESPESAS DO GAP-CG<br></center>
            </div>

          </div>
        </div>
        @if ($diaria->saram != $diaria->dono)
        <label style="text-size: 8px">Ordem de Serviço elaborada por: SARAM {{ $diaria->dono }}</label>
        @endif
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
