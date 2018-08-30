@extends('template.template')
@php
  $tela = 'edit';
  //$apresenta = $_GET['apresenta'];
@endphp

@section('t')
  @if ( $apresenta == 'apresenta' )
    Ordem de Serviço - Nº: {{ $diaria->id }}
    @else
      Editar Ordem de Serviço - Nº: {{ $diaria->id }}
  @endif
  
@endsection

@section('title')
  O.S - Solicitação de Diárias
@endsection

@section('forma')

  {!! Form::model($diaria,
    ['route' => ['ficha.update', 'diaria' => $diaria->id],
    'class' => 'form',
    'method' => 'PUT']) !!}

    @include('ficha.formulario.formulario')

    {!! Form::close() !!}

  @endsection
