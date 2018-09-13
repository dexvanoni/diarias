@php
$val1 = Session::get('val1');
$val2 = Session::get('val2');
$val3 = Session::get('val3');
$val4 = Session::get('val4');
@endphp
<!DOCTYPE html>
<html>
<head>
  <meta charset="utf-8">
  <title>@yield('title')</title>
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link href="/bst/css/bootstrap.min.css" rel="stylesheet">
  <script src="/bst/js/jquery.min.js"></script>
  <!----------------------------------------------------------------------------------------------->
  <!------------------DIV CONTENDO OS CAMPOS PARA ADICIONAR NOVOS TRECHOS ------------------------------->

  <script type="text/javascript">
  var qtdeCampos = 1;
  function addCampos() {
    var objPai = document.getElementById("campoPai");
    var x = document.getElementById("camposAdd").innerHTML;
    //Criando o elemento DIV;
    var objFilho = document.createElement("div");
    //Definindo atributos ao objFilho:
    objFilho.setAttribute("id","trecho"+qtdeCampos);

    //Inserindo o elemento no pai:
    objPai.appendChild(objFilho);
    //Escrevendo algo no filho recém-criado:
    document.getElementById("trecho"+qtdeCampos).innerHTML = "<div id='camposAdd'><div class='row'><div title='Informe a cidade de realização do serviço' class='col-md-4'><div class='input-group'><span class='input-group-addon' id='basic-addon1'>19</span><select class='form-control input-sm' title='LOCAL DE REALIZAÇÃO DO SERVIÇO (Cidade)' id='tr["+qtdeCampos+"][local_servico]' name='tr["+qtdeCampos+"][local_servico]'><option value='placeholder'>LOCAL DE REALIZAÇÃO DO SERVIÇO (Cidade):</option><option value='val_br_am_rj'>Brasília, Manaus ou Rio de Janeiro</option><option value='val_bh_fl_pa_rc_sl_sp'>Belo Horizonte, Fortaleza, Porto Alegre, Recife, Salvador ou São Paulo</option><option value='val_capitais'>Outra capital de Estado</option><option value='val_cidades'>Outra Cidade</option></select></div></div><div class='col-md-2'><input id='hp["+qtdeCampos+"]' name='tr["+qtdeCampos+"][houve_pernoite]' value='s' type='checkbox'>&nbsp;&nbsp;&nbsp;Houve Pernoite?</div><div class='col-sm-2'><input id='tr["+qtdeCampos+"][qt_pernoite]' class='form-control input-sm' placeholder='QNT DE PERNOITES:' name='tr["+qtdeCampos+"][qt_pernoite]' type='text'></div><div title='Informe os locais de pernoite' class='col-md-4'><div class='input-group'><span class='input-group-addon' id='basic-addon1'>20</span><input class='form-control input-sm' placeholder='LOCAL(IS) DE PERNOITE:' name='tr["+qtdeCampos+"][local_pernoite]' type='text'></div></div><p></p></div><p></p><div class='row'><div title='Informe a data e hora de início e retorno do afastamento da sede' class='col-md-4'><div class='input-group'><span class='input-group-addon' id='basic-addon1'>21 - AFASTAMENTO DE SEDE:</span><input class='form-control input-sm a' placeholder='Data Início:' id='dt_ida["+qtdeCampos+"]' name='tr["+qtdeCampos+"][data_afastamento_inicio]' type='text'><input class='form-control input-sm a' placeholder='Hora:' id='hr_ida["+qtdeCampos+"]' name='tr["+qtdeCampos+"][hora_afastamento_inicio]' type='text'><input class='form-control input-sm a' placeholder='Data Retorno:' id='dt_ret["+qtdeCampos+"]' name='tr["+qtdeCampos+"][data_afastamento_retorno]' type='text'><input class='form-control input-sm a' placeholder='Hora:' id='hr_ret["+qtdeCampos+"]' name='tr["+qtdeCampos+"][hora_afastamento_retorno]' type='text'></div></div><div class='col-md-4'><div class='input-group'><span class='input-group-addon' id='basic-addon1'>22</span><select id='h_d["+qtdeCampos+"]' class='form-control input-sm a' name='tr["+qtdeCampos+"][adicional_deslocamento]'><option value='placeholder'>Informe se houve ou não adicional de deslocamento:</option><option value='SIM'>SIM</option><option value='NÃO'>NÃO</option></select><select class='form-control input-sm a' id='tr["+qtdeCampos+"][total_acrescimos]' name='tr["+qtdeCampos+"][total_acrescimos]'><option value='placeholder'>TOTAL DE ACRÉSCIMOS:</option><option value='DIÁRIA COMPLETA'>DIÁRIA COMPLETA</option><option value='1/2 DIÁRIA'>1/2 DIÁRIA</option></select></div><div style='border:1px solid #d3d3d3;border-radius:3px' class='input-group'><span style='border:1px solid #d3d3d3;border-radius:3px;font-size:10px' class='input-group-addon' id='basic-addon1'>23 - VALOR TOTAL (Diária + Adc. Desl.)<br>Sem custo = </span><input title='Valor total de diárias + adicionais de deslocamento' class='form-control input-sm a' placeholder='R$' id='tr["+qtdeCampos+"][valor_total]' name='tr["+qtdeCampos+"][valor_total]' type='text'><input id='zc["+qtdeCampos+"]' class='form-control input-sm a' name='tr["+qtdeCampos+"][ck_valor_total]' value='Sem Custo' type='checkbox'></div></div><div class='col-md-4'><div class='input-group'><span title='Informe se faz jus a auxílio transporte' style='border:1px solid #d3d3d3;border-radius:3px' class='input-group-addon' id='basic-addon1'>24 - AUXÍLIO TRANSPORTE:&nbsp;</span><input title='Valor de transporte' class='form-control input-sm a' placeholder='R$' id='valor_transp["+qtdeCampos+"]' name='tr["+qtdeCampos+"][t_s]' type='text'></div><div class='input-group'><span title='Informe se faz jus a auxílio alimentação' style='border:1px solid #d3d3d3;border-radius:3px' class='input-group-addon' id='basic-addon1'>25 - AUXÍLIO ALIMENTAÇÃO:</span><input title='Valor de Alimentação' class='form-control input-sm a' placeholder='R$' id='valor_alim["+qtdeCampos+"]' name='tr["+qtdeCampos+"][a_s]' type='text'></div></div></div></div><button type='button' class='btn btn-danger' aria-label='addCampo' onclick='removerCampo("+qtdeCampos+")' title='Excluir trecho' value='Remover Trecho'><span class='glyphicon glyphicon-minus'></span> Remover trecho</button><hr>";
    qtdeCampos++;
    //$('#qtdeCampos').val(qtdeCampos);
  }


  function removerCampo(id) {
    var objPai = document.getElementById("campoPai");
    var objFilho = document.getElementById("trecho"+id);

    //Removendo o DIV com id específico do nó-pai:
    var removido = objPai.removeChild(objFilho);
  }
</script>
<!---------------------------------------------------------------------------------------------------------->

</head>
<body>
  <!--Nav Bar-->
  <nav class="navbar navbar-default">
    <div class="container-fluid">
      <!-- Brand and toggle get grouped for better mobile display -->
      <div class="navbar-header">
        <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#bs-example-navbar-collapse-1" aria-expanded="false">
          <span class="sr-only">Toggle navigation</span>
          <span class="icon-bar"></span>
          <span class="icon-bar"></span>
          <span class="icon-bar"></span>
        </button>
        <i class="navbar-brand">@yield('t')</i>
      </div>
      <!-- Collect the nav links, forms, and other content for toggling -->
      <div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
        <ul class="nav navbar-nav navbar-right">
          <li><a href="{{ route('dashboard') }}">DASHBOARD</a></li>
          <li><a href="http://10.152.16.203/gapcg">GAP-CG</a></li>
          <li><a href="http://10.152.16.203/ala5">ALA5</a></li>
        </ul>
      </div><!-- /.navbar-collapse -->
    </div><!-- /.container-fluid -->
  </nav>
  <div class="container">
    @if ($tela == 'show')
      <div class="pull-right">
        <input type="button" value="Voltar" class="btn btn-primary" onClick="history.go(-1)">
        <!--<a href="{{ route('verTodasOs') }}" class="btn btn-primary"> Voltar</a>-->
      </div>
    @else
      <div class="pull-right">
        <input type="button" value="Voltar" class="btn btn-primary" onClick="history.go(-1)">
        <!--<a href="{{ route('ficha.index') }}" class="btn btn-primary"> Voltar</a>-->
      </div>
    @endif

    @yield('forma')

    <hr>

  </div>
  @php
    session_start();
    $administrador = Session::get('administrador');
  @endphp
  <script type="text/javascript">
  var a = "<?php echo $tela; ?>";
  var apresenta = "<?php echo $apresenta; ?>";
  var dias;
  var total_dias;
  var meia;
  var hp;
  var total_acrescimos;
  var tot_n;
  var flag = 0;
  var valor_alim;
  var valor_transp;

  $( document ).ready(function() {



    $('#a').val(<?php echo $val1; ?>);
    $('#b').val(<?php echo $val2; ?>);
    $('#c').val(<?php echo $val3; ?>);
    $('#d').val(<?php echo $val4; ?>);

    /*if ($('#qt_acrescimo').val('')){
    $('#qt_acrescimo').val(0.0)
  }
  if ($('#val_ac').val('')){
  $('#val_ac').val(0.0)
}
if ($('#desc_a').val('')){
$('#desc_a').val(0.0)
}
if ($('#qt_dias_a').val('')){
$('#qt_dias_a').val(0.0)
}
if ($('#resultado_dias_a').val('')){
$('#resultado_dias_a').val(0.0)
}
if ($('#desc_b').val('')){
$('#desc_b').val(0.0)
}
if ($('#qt_dias_b').val('')){
$('#qt_dias_b').val(0.0)
}
if ($('#resultado_dias_b').val('')){
$('#resultado_dias_b').val(0.0)
}
if ($('#qt_meia_diaria').val('')){
$('#qt_meia_diaria').val(0.0)
}
if ($('#qt_diaria_completa').val('')){
$('#qt_diaria_completa').val(0.0)
}
if ($('#num_total_acrescimos').val('')){
$('#num_total_acrescimos').val(0.0)
}
if ($('#valor_restituicao').val('')){
$('#valor_restituicao').val(0.0)
}*/

  if (a == 'create'){
    //$('.homologa').hide();
    //$('.facd').hide();
    $('.homologa').show();
    $('.facd').show();

  }

if ((a == 'edit') && (apresenta == 'apresenta')){
  $('.homologa').show();
  $('.facd').show();
} else if ((a == 'edit') && (apresenta == 'editando')) {
  //$('.homologa').hide();
  $('.facd').show();
}

if (a == 'print'){
  $('.homologa').show();
  $('.facd').show();
}

// campos extras para justificativa
if ( a == 'edit') {
  $('#camposExtras').show();
} else {
  $('#camposExtras').hide();
};

$("#alteracao_servico_s").click(function(){
  $('#camposExtras').show();
});

$("#alteracao_servico_n").click(function(){
  $('#camposExtras').hide();
});

if ( a == 'edit') {
  $('#alt_chefe').hide();

};

$("#alt_chefe_im_s").click(function(){
  $('#alt_chefe').show();
});

$("#alt_chefe_im_n").click(function(){
  $('#alt_chefe').hide();
});

if ( a == 'edit') {
  $('#t_s').show();
  $('#a_s').show();
} else {
  $('#t_s').hide();
  $('#a_s').hide();
};

$("#trans_s").click(function(){
  $('#t_s').show();
});

$("#trans_n").click(function(){
  $('#t_s').hide();
});

$("#al_s").click(function(){
  $('#a_s').show();
});

$("#al_n").click(function(){
  $('#a_s').hide();
});

/*    document.getElementById("a").readOnly = true;
document.getElementById("b").readOnly = true;
document.getElementById("c").readOnly = true;
document.getElementById("d").readOnly = true;
document.getElementById("a1").readOnly = true;
document.getElementById("b1").readOnly = true;
document.getElementById("c1").readOnly = true;
document.getElementById("d1").readOnly = true;
document.getElementById("resultado1").readOnly = true;
document.getElementById("resultado2").readOnly = true;
document.getElementById("resultado3").readOnly = true;
document.getElementById("resultado4").readOnly = true;
document.getElementById("resultado_total").readOnly = true;*/

$('#l1').hide();
$('#l2').hide();
$('#l3').hide();
$('#l4').hide();

// se sair dos inputs faz a função:
// calculo de datas
/*$('#hr_ret, #dt_ret, #dt_ida, #hr_ida, #total_acrescimos, #hp, #zc, #h_d, #trans_s, #trans_n, #al_s, #al_n, #valor_alim, #valor_transp, #qt_pernoite').focusout(function(){

var local = $('#local_servico').val();
total_acrescimos = $('#total_acrescimos').val();
var valor_alim = $('#valor_alim').val();
var valor_transp = $('#valor_transp').val();
var qtpernoite = $('#qt_pernoite').val();

if (document.getElementById("trans_n").checked == true) {
valor_transp = 0;
}
if (document.getElementById("al_n").checked == true) {
valor_alim = 0;
}

var di = $("#dt_ida").val().split("/");
var dr = $("#dt_ret").val().split("/");
var d_i = new Date(di[2] + "/" + di[1] + "/" + di[0]);
var d_r = new Date(dr[2] + "/" + dr[1] + "/" + dr[0]);
var dias = (((Date.parse(d_r)) - (Date.parse(d_i))) / (24 * 60 * 60 * 1000));
// calculo de horas
var hi = $("#hr_ida").val();
var hr = $("#hr_ret").val();

i = hi.split(':');
r = hr.split(':');

min = r[1]-i[1];
hour_carry = 0;
if(min < 0){
min += 60;
hour_carry += 1;
}
hour = r[0]-i[0]-hour_carry;
total_horas = hour + ":" + min;

// pega o checkbox se existe pernoite
var hp = document.getElementById("hp").checked;

// se for 2 dias de diferença ele diminui 1 dia
if ( (Date.parse(d_i) == Date.parse(d_r)) && (parseInt(hour) <= 7) && (parseInt(min) <= 59)){
total_dias = 0;
meia = 0;
flag = 0;
} else if ((Date.parse(d_i) == Date.parse(d_r)) && (parseInt(hour) >= 8 )){
total_dias = 0.5;
meia = 0;
flag = 0;
} else if ((parseFloat(dias) == 1) && (hp == false )){
total_dias = 1;
meia = 0;
flag = 1;
} else if ((parseFloat(dias) == 1) && (hp == true )){
total_dias = 1;
meia = 0.5;  $('#a1','#b1','#c1','#d1').focusout(function(){
var valor_linha_1 = $('#a').val();
var qt_linha_1 = $('#a1').val();
var res1 = $valor_linha_1*qt_linha_1;
$('#resultado1').val($res1);
flag = 0;
} else if (parseFloat(dias) > 1) {
total_dias = parseInt(dias);
meia = 0.5;
flag = 0;
} else {
//total_dias = '';
//meia = '';
}

// Calculando valores dos trechos
//$('#hr_ret').focusout(function(){
if(local == 'val_br_am_rj'){
$('#a').val(<?php echo $val1; ?>);
$('#a1').val(parseFloat(total_dias));
var a = $("#a").val();
var a1 = $("#a1").val();
if ((a1 > 0.5) && (flag == 0)) {
var volta1 = a / 2;
var resultado1 	= a * a1 + volta1;
} else {
var resultado1 	= a * a1;
}
$('#resultado1').val(resultado1.toFixed(2));

$('#b').val(0);
$('#c').val(0);
$('#d').val(0);
$('#b1').val(0);
$('#c1').val(0);
$('#d1').val(0);
$('#resultado2').val(0);
$('#resultado3').val(0);
$('#resultado4').val(0);

} else if (local == 'val_bh_fl_pa_rc_sl_sp'){

$('#b').val(<?php echo $val2; ?>);
$('#b1').val(parseFloat(total_dias));
var b = $("#b").val();
var b1 = $("#b1").val();
if ((b1 > 0.5) && (flag == 0)){
var volta2 = b / 2;
var resultado2 	= b * b1 + volta2;
} else {
var resultado2 	= b * b1;
}
$('#resultado2').val(resultado2.toFixed(2));

$('#a').val(0);
$('#c').val(0);
$('#d').val(0);
$('#a1').val(0);
$('#c1').val(0);
$('#d1').val(0);
$('#resultado1').val(0);
$('#resultado3'if ($('#qt_acrescimo').val('')){
$('#qt_acrescimo').val(0.0)
}
if ($('#val_ac').val('')){
$('#val_ac').val(0.0)
}
if ($('#desc_a').val('')){
$('#desc_a').val(0.0)
}
if ($('#qt_dias_a').val('')){
$('#qt_dias_a').val(0.0)
}
if ($('#resultado_dias_a').val('')){
$('#resultado_dias_a').val(0.0)
}
if ($('#desc_b').val('')){
$('#desc_b').val(0.0)
}
if ($('#qt_dias_b').val('')){
$('#qt_dias_b').val(0.0)
}
if ($('#resultado_dias_b').val('')){
$('#resultado_dias_b').val(0.0)
}
if ($('#qt_meia_diaria').val('')){
$('#qt_meia_diaria').val(0.0)
}
if ($('#qt_diaria_completa').val('')){
$('#qt_diaria_completa').val(0.0)
}
if ($('#num_total_acrescimos').val('')){
$('#num_total_acrescimos').val(0.0)
}
if ($('#valor_restituicao').val('')){
$('#valor_restituicao').val(0.0)
}).val(0);
$('#resultado4').val(0);

} else if (local == 'val_capitais') {
$('#c').val(<?php echo $val3; ?>);
$('#c1').val(parseFloat(total_dias));
var c = $("#c").val();
var c1 = $("#c1").val();
if ((c1 > 0.5) && (flag == 0)){
var volta3 = c / 2;
var resultado3 	= c * c1 + volta3;
} else {
var resultado3 	= c * c1;
}
$('#resultado3').val(resultado3.toFixed(2));

$('#a').val(0);
$('#b').val(0);
$('#d').val(0);
$('#a1').val(0);
$('#b1').val(0);
$('#d1').val(0);
$('#resultado1').val(0);
$('#resultado2').val(0);
$('#resultado4').val(0);

} else if (local == 'val_cidades'){

$('#d').val(<?php echo $val4; ?>);
$('#d1').val(parseFloat(total_dias));
var d = $("#d").val();
var d1 = $("#d1").val();
if ((d1 > 0.5) && (flag == 0)){
var volta4 = d / 2;
var resultado4 	= d * d1 + volta4;
} else {
var resultado4 	= d * d1;
}
/*        var volta4 = d / 2
var resultado4 	= d * d1 + volta4;*/
/*$('#resultado4').val(resultado4.toFixed(2));

$('#a').val(0);
$('#b').val(0);
$('#c').val(0);
$('#a1').val(0);
$('#b1').val(0);
$('#c1').val(0);
$('#resultado1').val(0);
$('#resultado2').val(0);
$('#resultado3').val(0);
}

if ((flag == 1) || ((Date.parse(d_i) == Date.parse(d_r)) && (parseInt(hour) >= 8))){
$('#l1').hide();
$('#l2').hide();
$('#l3').hide();
$('#l4').hide();
}

if (a1 >= 1){
$('#l1').show();
$('#l2').hide();
$('#l3').hide();
$('#l4').hide();
}
if (b1 >= 1) {
$('#l2').show();
$('#l1').hide();
$('#l3').hide();
$('#l4').hide();
}
if (c1 >= 1) {
$('#l3').show();
$('#l2').hide();
$('#l1').hide();
$('#l4').hide();
}
if (d1 >= 1) {
$('#l4').show();
$('#l2').hide();
$('#l3').hide();
$('#l1').hide();
}
var r1 = $('#resultado1').val();
var r2 = $('#resultado2').val();
var r3 = $('#resultado3').val();
var r4 = $('#resultado4').val();

var desl = 95;

if ((parseInt(total_dias) < 1) || ($('#h_d').val() == 'NÃO') || ($('#qt_pernoite').val() == 0) || ($('#qt_pernoite').val() == '')){

$('#val_ac').val(0);
$('#qt_acrescimo').val(0);

var tot = parseFloat(r1) + parseFloat(r2) + parseFloat(r3) + parseFloat(r4);
if ((total_acrescimos == "1/2 DIÁRIA")){
var totn = tot / 2;
//var tt = ($totn / 0.05, 0) * 0.05
$('#resultado_total').val(totn.toFixed(2) - valor_alim - valor_transp);
} else {
//var tt = ($tot / 0.05, 0) * 0.05
$('#resultado_total').val(tot.toFixed(2) - valor_alim - valor_transp);
}
} else {

$('#val_ac').val(95);
$('#qt_acrescimo').val(qtpernoite);

var ac = $('#val_ac').val() * $('#qt_acrescimo').val();

var tot = parseFloat(r1) + parseFloat(r2) + parseFloat(r3) + parseFloat(r4) + desl;
if (total_acrescimos == "1/2 DIÁRIA"){
var totn = tot / 2;

$('#resultado_total').val(totn.toFixed(2) - valor_alim - valor_transp + ac);

} else {

$('#resultado_total').val(tot.toFixed(2) - valor_alim - valor_transp + ac);
}

}
var val_tot = $('#resultado_total').val();
$('#valor_total').val("R$ " + val_tot);

var ck = document.getElementById("zc").checked;
if ( ck == true ) {
$('#a').val(0);
$('#b').val(0);
$('#c').val(0);
$('#d').val(0);
$('#a1').val(0);
$('#b1').val(0);
$('#c1').val(0);
$('#d1').val(0);
$('#resultado1').val(0);
$('#resultado2').val(0);
$('#resultado3').val(0);
$('#resultado4').val(0);
$('#valor_total').val(0);
$('#resultado_total').val(0);
$('#val_ac').val(0);
$('#qt_acrescimo').val(0);
}

//computo de número de diárias completas e 1/2 diárias
//var num_completa = $('#a1').val() + $('#a1').val() + $('#a1').val() + $('#a1').val();
var num_meia;

if ((Date.parse(d_i) == Date.parse(d_r)) && (parseInt(hour) >= 8 )) {
$('#qtn_md').val(1);
$('#qtn_dc').val(0);
}

if ((total_acrescimos == "1/2 DIÁRIA") && !(Date.parse(d_i) == Date.parse(d_r))){
num_meia = total_dias;
if (flag == 0) {
$('#qtn_md').val(num_meia + 1);
} else {
$('#qtn_md').val(num_meia);
}
$('#qtn_dc').val(0);
} else if ((total_acrescimos == "DIÁRIA COMPLETA") && !(Date.parse(d_i) == Date.parse(d_r))) {
num_meia = 1;
if(flag == 0){
$('#qtn_md').val(num_meia);
} else {
$('#qtn_md').val(num_meia + 1);
}
$('#qtn_dc').val(total_dias);
}
var co = $('#qtn_dc').val();
var md = $('#qtn_md').val();
var ta = $('#qt_acrescimo').val();

$('#qt_meia_diaria').val(md);
$('#qt_diaria_completa').val(co);
$('#num_total_acrescimos').val(ta);

//alert(total_dias + "e" + flag)
//alert(tot + "e" + total_acrescimos + "d_i = " + d_i + " d_r = " + d_r + "HP = " + hp + " dias = " + parseInt(dias) + " total horas = " + total_horas + " hora = " + hour + " total_dias = " +   parseFloat(total_dias) + " minutos = " + min + " meia = " + meia );
})*/
});
/*$('#sub').click(function(){
var completa = $('#qtn_dc').val();
var meia_diaria = $('#qtn_md').val();
if ((completa >= 15) || (meia_diaria >= 15)){
alert("Necessita de tabela comparativa entre ajuda de custo e diárias!");
}*/
//--------------------------------------------------------
// colocando mais campos para locais de serviço
//

function duplicarCampos(){
  var clone = document.getElementById('origem').cloneNode(true);
  var destino = document.getElementById('destino');
  destino.appendChild (clone);
  var camposClonados = clone.getElementsByTagName('input');
  for(i=0; i<camposClonados.length;i++){
    camposClonados[i].value = '';
  }
}
function removerCampos(id){
  var node1 = document.getElementById('destino');
  node1.removeChild(node1.childNodes[0]);
}
if (($('#zc').val("") || ($('#hp').val(""))) ){
  $('#zc').val("Com custo");
  $('#hp').val("Não houveram pernoites");
}



//novo código de computos
$('#a1').focusout(function(){
  var valor_linha_1 = $('#a').val();
  var qt_linha_1 = $('#a1').val();
  var res1 = valor_linha_1*qt_linha_1;
  var n1 = res1.toFixed(2);
  $('#resultado1').val(n1);
});
$('#b1').focusout(function(){
  var valor_linha_2 = $('#b').val();
  var qt_linha_2 = $('#b1').val();
  var res2 = valor_linha_2*qt_linha_2;
  var n2 = res2.toFixed(2);
  $('#resultado2').val(n2);
});
$('#c1').focusout(function(){
  var valor_linha_3 = $('#c').val();
  var qt_linha_3 = $('#c1').val();
  var res3 = valor_linha_3*qt_linha_3;
  var n3 = res3.toFixed(2);
  $('#resultado3').val(n3);
});
$('#d1').focusout(function(){
  var valor_linha_4 = $('#d').val();
  var qt_linha_4 = $('#d1').val();
  var res4 = valor_linha_4*qt_linha_4;
  var n4 = res4.toFixed(2);
  $('#resultado4').val(n4);
});
$('#qt_dias_a').focusout(function(){
  var valor_linha_5 = $('#desc_a').val();
  var qt_linha_5 = $('#qt_dias_a').val();
  var res5 = valor_linha_5*qt_linha_5;
  var n5 = res5.toFixed(2);
  $('#resultado_dias_a').val(n5);
});
$('#qt_dias_b').focusout(function(){
  var valor_linha_6 = $('#desc_b').val();
  var qt_linha_6 = $('#qt_dias_b').val();
  var res6 = valor_linha_6*qt_linha_6;
  var n6 = res6.toFixed(2);
  $('#resultado_dias_b').val(n6);
});

function calcular() {
  //cálculo de subtotal somente das diárias

  var t1 = parseFloat($('#resultado1').val());
  var t2 = parseFloat($('#resultado2').val());
  var t3 = parseFloat($('#resultado3').val());
  var t4 = parseFloat($('#resultado4').val());


  if ($('#resultado1').val() == "") {
    t1 = 0;
  }

  if ($('#resultado2').val() == "") {
    t2 = 0;
  }

  if ($('#resultado3').val() == "") {
    t3 = 0;
  }

  if ($('#resultado4').val() == "") {
    t4 = 0;
  }
  var sub = t1 + t2 + t3 + t4;
  var n7 = sub.toFixed(2);
  //document.getElementById('subtotal').value = t1 + t2 + t3 + t4;
  $('#subtotal').val(n7);

};

function calcular_total() {
  var val_ac = parseFloat($('#val_ac').val());
  var resultado_dias_a = parseFloat($('#resultado_dias_a').val());
  var resultado_dias_b = parseFloat($('#resultado_dias_b').val());
  var sub_diarias = parseFloat($('#subtotal').val());


  if ($('#val_ac').val() == "") {
    val_ac = 0;
  }
  if ($('#resultado_dias_a').val() == "") {
    resultado_dias_a = 0;
  }
  if ($('#resultado_dias_b').val() == "") {
    resultado_dias_b = 0;
  }
  if (sub_diarias == "") {
    sub_diarias = 0;
  }

  var tot = val_ac + resultado_dias_a + resultado_dias_b + sub_diarias;
  var tt = tot.toLocaleString('pt-br', {minimumFractionDigits: 2});
  $('#resultado_total').val(tt);
  $('#valor_total').val(tt);
}
//zerar todos os campos de cálculos
function limpa_diarias() {
  $('#resultado1').val(0);
  $('#resultado2').val(0);
  $('#resultado3').val(0);
  $('#resultado4').val(0);
  $('#a1').val(0);
  $('#b1').val(0);
  $('#c1').val(0);
  $('#d1').val(0);
  $('#subtotal').val(0);
  $('#qt_acrescimo').val(0);
  $('#val_ac').val(0);
  $('#a1').val(0);
  $('#desc_a').val(0);
  $('#desc_b').val(0);
  $('#qt_dias_a').val(0);
  $('#qt_dias_b').val(0);
  $('#resultado_dias_a').val(0);
  $('#resultado_dias_b').val(0);
  $('#resultado_total').val(0);
}




</script>
<script src="/bst/js/bootstrap.min.js"></script>

</body>
</html>
