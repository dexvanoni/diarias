<!DOCTYPE html>
<html>
<head>
  <meta charset="utf-8">
  <title>Meu Dashboard</title>
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link href="/bst/css/bootstrap.min.css" rel="stylesheet">
  <script src="/bst/js/jquery.min.js"></script>
</head>
<body>
  @php
  $d1 = Session::get('pescodigo');
  $dono = Session::get('dono');
  $administrador = Session::get('administrador');
  @endphp
  <div class="jumbotron">
    <div class="col-md-offset-2">
      <div class="container">
        <h2>Meu dashboard</h2>
        @if ($administrador)
          <h5>Você é administrador do sistema!</h5>
        @endif
        @if ($dono != $d1)
          <p>Você está logado com o SARAM: {{ $dono }} e realizará as ações para o {{ Session::get('grad') }} {{ Session::get('pesnguerra') }}<br> com o SARAM: {{ $d1 }}</p>
        @else
          <p>Usuário: {{ Session::get('grad') }} {{ Session::get('pesnguerra') }}</p>
        @endif
      </div>
    </div>

<div class="container">
  <div class="row">
    <div class="col-md-4 col-xs-offset-1">
      <div class="dropdown">
        <button class="btn btn-default dropdown-toggle" type="button" id="dropdownMenu1" data-toggle="dropdown" aria-haspopup="true" aria-expanded="true">
          MENU
          <span class="caret"></span>
        </button>
        <ul class="dropdown-menu" aria-labelledby="dropdownMenuDivider">
          <li><a href="{{ route('ficha.index') }}">Minhas OS</a></li>
          @if ($administrador)
            <li><a href="{{ route('verTodasOs') }}">Administração</a></li>
          @endif
          @php
          $ofs = array("15", "9", "10", "11", "4", "5", "8", "24", "27", "1", "3", "7", "2", "6");
          @endphp
          @if (in_array($usuario->pespostograd, $ofs))
            <li><a href="{{ route('aprova') }}">Aprovação</a></li>
          @endif
          <li role="separator" class="divider"></li>
          <li><a href="{{ route('account-sign-out') }}"> Logut </a></li>
        </ul>
      </div>
    </div>
    <div  style="margin-top: -20px" class="col-md-3 col-xs-offset-3">
      <label for="outro">Ordens de Serviço para outro militar</label>
      {!! Form::open(array('route' => 'outro', 'method' => 'POST')) !!}
        {!! Form::text('outro_militar', null, array('size'=>'15', 'id'=>'outro_militar', 'placeholder' => 'SARAM')) !!}
        {{ Form::submit('Ir', array('class'=>'btn btn-primary')) }}
      {!! Form::close() !!}
    </div>
  </div>
</div>

  </div>

  @if (Session::has('mensagem_sembanco'))
    <div class="alert alert-danger">
      {{ Session::get('mensagem_sembanco') }}
    </div>
  @endif
  <div class="container">
    <center><img src="/bst/brasao.png" class="img-responsive" alt="" height="150em" width="150em" /></center>
    <center><h2>SDTIC | 2018</h2></center>
  </div>
  <h6 style="margin-left: 30px">Desenvolvido por 3S SIN Vanoni</h6>
  <script src="/bst/js/bootstrap.min.js"></script>
</body>
</html>
