<div class="row">
    <div class="col-md-4">
        <div class="form-group">
            {{ Form::label('Código da reserva')}}
            {{ Form::text('codigo_reserva', null, ['class' => 'form-control', 'autofocus']) }}
        </div>
    </div>
    <div class="col-md-4">
        <div class="form-group">
            {{ Form::label('Código da sala')}}
            {{ Form::text('codigo_sala', null, ['class' => 'form-control']) }}
        </div>
    </div>
    <div class="col-md-4">
        <div class="form-group">
            {{ Form::label('Responsável pela reserva')}}
            {{ Form::select('user_id', isset($usuarios) ? $usuarios : [], null, ['class' => 'form-control', 'placeholder' => 'Selecione']) }}
        </div>
    </div>
</div>
<div class="row">
    <div class="col-md-4">
        {{ Form::submit('Buscar',['class' => 'btn btn-primary']) }}
    </div>        
</div>