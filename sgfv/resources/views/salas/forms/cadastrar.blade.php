<div class="row">
    <div class="col-md-4">
        <div class="form-group">
            {{ Form::label('Código')}}
            {{ Form::text('codigo', null, ['class' => 'form-control', 'autofocus', 'maxlength' => 5]) }}
        </div>
    </div>
    <div class="col-md-4">
        <div class="form-group">
            {{ Form::label('Nome')}}
            {{ Form::text('nome', null, ['class' => 'form-control', 'maxlength' => 20]) }}
        </div>
    </div>
    <div class="col-md-4">
        <div class="form-group">
            {{ Form::label('Localização')}}
            {{ Form::text('localizacao', null, ['class' => 'form-control', 'maxlength' => 50]) }}
        </div>
    </div>
</div>
<div class="row">
    <div class="col-md-4">
        {{ Form::submit('Salvar',['class' => 'btn btn-primary']) }}
    </div>        
</div>