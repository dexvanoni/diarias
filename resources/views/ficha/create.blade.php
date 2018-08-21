@extends('template.template')

@section('t')
  Nova Ordem de Serviço
@endsection

@section('title')
  O.S - Solicitação de Diárias
@endsection

@section('forma')

  {!! Form::open(array('route' => 'ficha.store', 'method' => 'POST', 'name'=>'form1', 'id'=>'form1')) !!}
   {!! csrf_field() !!}
  @php
    $tela = 'create';
    $apresenta = '';
  @endphp


  @include('ficha.formulario.formulario')
  {!! Form::close() !!}

@endsection
