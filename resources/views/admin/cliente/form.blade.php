<div class="form-group {{ $errors->has('nombre') ? 'has-error' : ''}}">
    <label for="nombre" class="col-md-4 control-label">{{ 'Nombre' }}</label>
    <div class="col-md-6">
        {!! Form::text('nombre', null, ['class' => 'form-control','autofocus'=>'autofocus', 'id'=>'nombre']), old('nombre')  !!}
        {!! $errors->first('nombre', '<p class="help-block">:message</p>') !!}
    </div>
</div><div class="form-group {{ $errors->has('apellido') ? 'has-error' : ''}}">
    <label for="apellido" class="col-md-4 control-label">{{ 'Apellido' }}</label>
    <div class="col-md-6">
        {!! Form::text('apellido', null, ['class' => 'form-control','autofocus'=>'autofocus', 'id'=>'apellido']), old('apellido')  !!}
        {!! $errors->first('apellido', '<p class="help-block">:message</p>') !!}
    </div>
</div><div class="form-group {{ $errors->has('cedula') ? 'has-error' : ''}}">
    <label for="cedula" class="col-md-4 control-label">{{ 'Cedula' }}</label>
    <div class="col-md-6">
        {!! Form::text('cedula', null, ['class' => 'form-control','autofocus'=>'autofocus', 'id'=>'cedula']), old('cedula')  !!}
        {!! $errors->first('cedula', '<p class="help-block">:message</p>') !!}
    </div>
</div><div class="form-group {{ $errors->has('ruc') ? 'has-error' : ''}}">
    <label for="ruc" class="col-md-4 control-label">{{ 'Ruc' }}</label>
    <div class="col-md-6">
        {!! Form::text('ruc', null, ['class' => 'form-control','autofocus'=>'autofocus', 'id'=>'ruc']), old('ruc')  !!}
        {!! $errors->first('ruc', '<p class="help-block">:message</p>') !!}
    </div>
</div><div class="form-group {{ $errors->has('email') ? 'has-error' : ''}}">
    <label for="email" class="col-md-4 control-label">{{ 'Email' }}</label>
    <div class="col-md-6">
        {!! Form::text('email', null, ['class' => 'form-control','autofocus'=>'autofocus', 'id'=>'email']), old('email')  !!}
        {!! $errors->first('email', '<p class="help-block">:message</p>') !!}
    </div>
</div><div class="form-group {{ $errors->has('telefono') ? 'has-error' : ''}}">
    <label for="telefono" class="col-md-4 control-label">{{ 'Telefono' }}</label>
    <div class="col-md-6">
        {!! Form::text('telefono', null, ['class' => 'form-control','autofocus'=>'autofocus', 'id'=>'telefono']), old('telefono')  !!}
        {!! $errors->first('telefono', '<p class="help-block">:message</p>') !!}
    </div>
</div><div class="form-group {{ $errors->has('cel_movi') ? 'has-error' : ''}}">
    <label for="cel_movi" class="col-md-4 control-label">{{ 'Cel Movi' }}</label>
    <div class="col-md-6">
        {!! Form::text('cel_movi', null, ['class' => 'form-control','autofocus'=>'autofocus', 'id'=>'cel_movi']), old('cel_movi')  !!}
        {!! $errors->first('cel_movi', '<p class="help-block">:message</p>') !!}
    </div>
</div><div class="form-group {{ $errors->has('cel_claro') ? 'has-error' : ''}}">
    <label for="cel_claro" class="col-md-4 control-label">{{ 'Cel Claro' }}</label>
    <div class="col-md-6">
        {!! Form::text('cel_claro', null, ['class' => 'form-control','autofocus'=>'autofocus', 'id'=>'cel_claro']), old('cel_claro')  !!}
        {!! $errors->first('cel_claro', '<p class="help-block">:message</p>') !!}
    </div>
</div><div class="form-group {{ $errors->has('wts') ? 'has-error' : ''}}">
    <label for="wts" class="col-md-4 control-label">{{ 'Wts' }}</label>
    <div class="col-md-6">
        {!! Form::text('wts', null, ['class' => 'form-control','autofocus'=>'autofocus', 'id'=>'wts']), old('wts')  !!}
        {!! $errors->first('wts', '<p class="help-block">:message</p>') !!}
    </div>
</div><div class="form-group {{ $errors->has('direccion') ? 'has-error' : ''}}">
    <label for="direccion" class="col-md-4 control-label">{{ 'Direccion' }}</label>
    <div class="col-md-6">
        {!! Form::text('direccion', null, ['class' => 'form-control','autofocus'=>'autofocus', 'id'=>'direccion']), old('direccion')  !!}
        {!! $errors->first('direccion', '<p class="help-block">:message</p>') !!}
    </div>
</div><div class="form-group {{ $errors->has('fecha_nacimiento') ? 'has-error' : ''}}">
    <label for="fecha_nacimiento" class="col-md-4 control-label">{{ 'Fecha Nacimiento' }}</label>
    <div class="col-md-6">
        {!! Form::text('fecha_nacimiento', null, ['class' => 'form-control datepicker','autofocus'=>'autofocus', 'id'=>'fecha_nacimiento']), old('fecha_nacimiento')  !!}
        {!! $errors->first('fecha_nacimiento', '<p class="help-block">:message</p>') !!}
    </div>
</div><div class="form-group {{ $errors->has('estado_civil') ? 'has-error' : ''}}">
    <label for="estado_civil" class="col-md-4 control-label">{{ 'Estado Civil' }}</label>
    <div class="col-md-6">
        <select name="estado_civil" class="form-control" id="estado_civil" >
    @foreach (json_decode('{"1":"Soltero\/a","2":"Casado\/a","3":"Divorciado\/a","4":"Viudo\/a","5":"Union de Hecho"}', true) as $optionKey => $optionValue)
        <option value="{{ $optionKey }}" {{ (isset($cliente->estado_civil) && $cliente->estado_civil == $optionKey) ? 'selected' : ''}}>{{ $optionValue }}</option>
    @endforeach
</select>
        {!! $errors->first('estado_civil', '<p class="help-block">:message</p>') !!}
    </div>
</div><div class="form-group {{ $errors->has('genero') ? 'has-error' : ''}}">
    <label for="genero" class="col-md-4 control-label">{{ 'Genero' }}</label>
    <div class="col-md-6">
        <select name="genero" class="form-control" id="genero" >
    @foreach (json_decode('{"1":"Masculino","0":"Femanino"}', true) as $optionKey => $optionValue)
        <option value="{{ $optionKey }}" {{ (isset($cliente->genero) && $cliente->genero == $optionKey) ? 'selected' : ''}}>{{ $optionValue }}</option>
    @endforeach
</select>
        {!! $errors->first('genero', '<p class="help-block">:message</p>') !!}
    </div>
</div><div class="form-group {{ $errors->has('pais_id') ? 'has-error' : ''}}">
    <label for="pais_id" class="col-md-4 control-label">{{ 'Pais' }}</label>
    <div class="col-md-6">
        {!! Form::select('pais_id', $paises, null, ['class' => 'form-control','autofocus'=>'autofocus','id'=>'pais_id']) !!}
        {!! $errors->first('pais_id', '<p class="help-block">:message</p>') !!}
    </div>
</div><div class="form-group {{ $errors->has('provincia_id') ? 'has-error' : ''}}">
    <label for="provincia_id" class="col-md-4 control-label">{{ 'Provincia' }}</label>
    <div class="col-md-6">
        {!! Form::select('provincia_id', $provincias, null, ['class' => 'form-control','autofocus'=>'autofocus','id'=>'provincia_id']) !!}
        {!! $errors->first('provincia_id', '<p class="help-block">:message</p>') !!}
    </div>
</div>
<div class="form-group {{ $errors->has('candon_id') ? 'has-error' : ''}}">
    <label for="candon_id" class="col-md-4 control-label">{{ 'Canton' }}</label>
    <div class="col-md-6">
        {!! Form::select('canton_id', $cantones, null, ['class' => 'form-control','autofocus'=>'autofocus','id'=>'canton_id']) !!}
        {!! $errors->first('candon_id', '<p class="help-block">:message</p>') !!}
    </div>
</div>
<div class="form-group {{ $errors->has('activo') ? 'has-error' : ''}}">
    <label for="activo" class="col-md-4 control-label">{{ 'Activo' }}</label>
    <div class="col-md-6">
        <select name="activo" class="form-control" id="activo" >
    @foreach (json_decode('{"1":"Activo","0":"Inactivo"}', true) as $optionKey => $optionValue)
        <option value="{{ $optionKey }}" {{ (isset($cliente->activo) && $cliente->activo == $optionKey) ? 'selected' : ''}}>{{ $optionValue }}</option>
    @endforeach
</select>
        {!! $errors->first('activo', '<p class="help-block">:message</p>') !!}
    </div>
</div>

<div class="form-group">
    <div class="col-md-offset-4 col-md-4">
        <input class="btn btn-primary" type="submit" value="{{ $submitButtonText or 'Crear' }}">
    </div>
</div>


<script type="text/javascript">
    $('.datepicker').datepicker({
    format: "yyyy/mm/dd",
    language: "es",
    autoclose: true
});
</script>