@extends('layouts.app')

@section('content')

<div class="container">

    <div class="row">
        <div class="col-md-12">
            <div class="well">
                {{ Form::model($sala, ['route' => ['salas.editar', $sala->sala_id]]) }}
                    @include('salas.forms.editar')
                {{ Form::close() }}
            </div>
        </div>
    </div>

</div>

@endsection