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
      <a href="{{ route('ficha.index') }}" class="btn btn-info"><span class="glyphicon glyphicon-th-list" aria-hidden="true"></span> Minhas OS</a>
      @if ($administrador)
        <a href="{{ route('verTodasOs') }}"class="btn btn-success"><span class="glyphicon glyphicon-king" aria-hidden="true"></span> Administração</a>
      @endif
      <a href="{{ route('account-sign-out') }}" class="btn btn-danger"> Logut </a>
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
    <center><h2>STIC | 2018</h2></center>
  </div>
  <h6 style="margin-left: 30px">Desenvolvido por 3S SIN Vanoni</h6>
  <script src="/bst/js/bootstrap.min.js"></script>
</body>
</html>
