@extends('layouts.app')

@section('content')

<div class="container">

<div class="well">
    {{ Form::open(['route' => 'salas.consultar', 'method' => 'GET', 'class' => ""]) }}
        @include('salas.forms.consultar')
    {{ Form::close() }}
</div>

@endsection