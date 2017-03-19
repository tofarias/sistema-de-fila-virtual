@extends('layouts.app')

@section('content')

<div class="container">

    <div class="row">
        <div class="col-md-12">
            <div class="well">
                {{ Form::open(['route' => 'reservas.consultar', 'method' => 'GET', 'class' => ""]) }}
                    @include('reservas.forms.consultar')
                {{ Form::close() }}
            </div>
        </div>
    </div>

    @include('reservas.lists.reservas')

</div>

@endsection