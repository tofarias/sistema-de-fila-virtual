<div class="row">
    <div class="col-md-4">
        <div class="form-group">
            {{ Form::label('Código')}}
            {{ Form::text('codigo', null, ['class' => 'form-control', 'autofocus']) }}
        </div>
    </div>
    <div class="col-md-4">
        <div class="form-group">
            {{ Form::label('Nome')}}
            {{ Form::text('nome', null, ['class' => 'form-control']) }}
        </div>
    </div>
    <div class="col-md-4">
        <div class="form-group">
            {{ Form::label('Localização')}}
            {{ Form::text('localizacao', null, ['class' => 'form-control']) }}
        </div>
    </div>
</div>
<div class="row">
    <div class="col-md-4">
        {{ Form::submit('Salvar',['class' => 'btn btn-primary']) }}
    </div>        
</div>