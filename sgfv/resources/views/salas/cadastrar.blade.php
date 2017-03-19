@extends('layouts.app')

@section('content')

<div class="container">

    <div class="row">
        <div class="col-md-12">
            <div class="well">
                {{ Form::open(['route' => ['salas.cadastrar']]) }}
                    @include('salas.forms.cadastrar')
                {{ Form::close() }}
            </div>
        </div>
    </div>

</div>

@endsection