<div class="row">
    <div class="col-md-3">
        <div class="form-group">
            {{ Form::label('Código')}}
            {{ Form::text('codigo', null, ['class' => 'form-control', 'autofocus', 'maxlength' => 5]) }}
        </div>
    </div>
    <div class="col-md-2">
        <div class="form-group">
            {{ Form::label('Data de Inicio')}}
            {{ Form::date('dt_inicio', \Carbon\Carbon::now(), ['class' => 'form-control']) }}
        </div>
    </div>
    <div class="col-md-2">
        <div class="form-group">
            {{ Form::label('Hora de Inicio')}}
            {{ Form::time('hr_inicio', date('H:i:s'), ['class' => 'form-control']) }}
        </div>
    </div>
</div>
<div class="row">
    <div class="col-md-4">
        <div class="form-group">
            {{ Form::label('Salas')}}
            {{ Form::select('sala_id', isset($salas) ? $salas : [], null, ['class' => 'form-control', 'placeholder' => 'Selecione']) }}
        </div>
    </div>
</div>
<div class="row">
    <div class="col-md-12">
        <div class="form-group">
            {{ Form::label('Observação')}}<br>
            {{ Form::textarea('observacao', null, ['cols'=> '100', 'rows' => '5']) }}
        </div>
    </div>
</div>
<div class="row">
    <div class="col-md-4">        
        {{ Form::submit('Salvar',['class' => 'btn btn-primary']) }}
    </div>        
</div>