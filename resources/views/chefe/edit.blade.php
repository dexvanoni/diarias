<!DOCTYPE html>
<html>
<head>
  <meta charset="utf-8">
  <title>Ordens de Serviço</title>
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link href="/bst/css/bootstrap.min.css" rel="stylesheet">
  <link href="/bst/css/jquery.dataTables.min.css" rel="stylesheet">
  <script src="/bst/js/jquery-1.12.4.min.js"></script>
</head>
<body>
  @php
  $d1 = Session::get('pescodigo');
  $dono = Session::get('dono');
  @endphp
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
        <i class="navbar-brand">Relação de Ordens de Serviço </i>
      </div>

      <!-- Collect the nav links, forms, and other content for toggling -->
      <div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">

        <ul class="nav navbar-nav navbar-right">
          <li><a href="http://10.152.16.203/gapcg">GAP-CG</a></li>
          <li><a href="http://10.152.16.203/ala5">ALA5</a></li>
        </ul>
      </div><!-- /.navbar-collapse -->
    </div><!-- /.container-fluid -->
  </nav>
  <div class="container">
    <div class="pull-right">
      <a href="{{ route('account-sign-out') }}" class="btn btn-danger"> Logut </a>
    </div>
    <a href="{{ route('ficha.create') }}" class="btn btn-info"><span class="glyphicon glyphicon-th-list" aria-hidden="true"></span> Criar Nova</a>
    <a href="{{ route('tcu') }}" class="btn btn-success"> Auditoria</a>
    <a href="{{ route('chefe.index') }}" class="btn btn-warning"> Cmts e Chefes</a>
    <input type="button" value="Voltar" class="btn btn-primary" onClick="history.go(-1)">
    <!--<a href="{{ route('dashboard') }}" class="btn btn-primary"> Voltar</a>-->
    <hr>
    @if (Session::has('mensagem_create'))
      <div class="alert alert-success">
        {{ Session::get('mensagem_create') }}
      </div>
    @endif
    @if (Session::has('mensagem_del'))
      <div class="alert alert-danger">
        {{ Session::get('mensagem_del') }}
      </div>
    @endif
    @if (Session::has('mensagem_edit'))
      <div class="alert alert-warning">
        {{ Session::get('mensagem_edit') }}
      </div>
    @endif
    @if (Session::has('mensagem_print'))
      <div class="alert alert-warning">
        {{ Session::get('mensagem_print') }}
      </div>
    @endif
    {!! Form::model($chefe,
      ['route' => ['chefe.update', 'chefe' => $chefe->id],
      'class' => 'form',
      'method' => 'PUT']) !!}
      <div class="col-md-8 col-md-offset-2">
        <div class="row">
          <div class="form-group">
            <label for="posto_grad" class="col-sm-3 control-label">Posto/Grad.</label>
            <div class="col-sm-8">
              <input type="text" class="form-control" name="posto_grad" id="posto_grad" title="Digite o Posto/Graduação que aparecerá na OS para assinatura." value="{{ $chefe->posto_grad }}">
            </div>
          </div>
        </div>
        <div class="row">
          <div style="margin-top: 15px" class="form-group">
            <label for="nome_completo" class="col-sm-3 control-label">Nome Completo</label>
            <div class="col-sm-8">
              <input type="text" class="form-control" name="nome_completo" id="nome_completo" value="{{ $chefe->nome_completo }}">
            </div>
          </div>
        </div>
        <div class="row">
          <div style="margin-top: 15px" class="form-group">
            <label for="nome_guerra" class="col-sm-3 control-label">Nome de Guerra</label>
            <div class="col-sm-8">
              <input type="text" class="form-control" name="nome_guerra" id="nome_guerra" value="{{ $chefe->nome_guerra }}">
            </div>
          </div>
        </div>
      </div>

      <div  class="row">
        <div class="form-group">
          <div class="col-md-7 col-md-offset-5">
            <button style="margin-top: 15px" type="submit" class="btn btn-success">Enviar</button>
          </div>
        </div>
      </div>

      {!! Form::close() !!}

      <strong><center><h3 style="color: red">CARGO/FUNÇÃO:</h3>{{ $chefe->cargo }}</center></strong>
    </div>
    <script src="/bst/js/bootstrap.min.js"></script>
    <script src="/bst/js/jquery.dataTables.min.js"></script>
    <script>
    $(document).ready(function(){
      $('#pesquisa').DataTable( {
        "scrollY":        "300px",
        "scrollCollapse": true,
        "language": {
          "url": "/js/Portuguese-Brasil.json"
        }

      } );
    });
    </script>

  </body>
  </html>
