<div class="form-group {{ $errors->has('nombre') ? 'has-error' : ''}}">
    <label for="nombre" class="col-md-4 control-label">{{ 'Nombre' }}</label>
    <div class="col-md-6">
        <input class="form-control" name="nombre" type="text" id="nombre" value="{{ $perfil->nombre or ''}}" required>
        {!! $errors->first('nombre', '<p class="help-block">:message</p>') !!}
    </div>
</div><div class="form-group {{ $errors->has('apellido') ? 'has-error' : ''}}">
    <label for="apellido" class="col-md-4 control-label">{{ 'Apellido' }}</label>
    <div class="col-md-6">
        <input class="form-control" name="apellido" type="text" id="apellido" value="{{ $perfil->apellido or ''}}" required>
        {!! $errors->first('apellido', '<p class="help-block">:message</p>') !!}
    </div>
</div><div class="form-group {{ $errors->has('cedula') ? 'has-error' : ''}}">
    <label for="cedula" class="col-md-4 control-label">{{ 'Cedula' }}</label>
    <div class="col-md-6">
        <input class="form-control" name="cedula" type="number" id="cedula" value="{{ $perfil->cedula or ''}}" required>
        {!! $errors->first('cedula', '<p class="help-block">:message</p>') !!}
    </div>
</div><div class="form-group {{ $errors->has('ruc') ? 'has-error' : ''}}">
    <label for="ruc" class="col-md-4 control-label">{{ 'Ruc' }}</label>
    <div class="col-md-6">
        <input class="form-control" name="ruc" type="number" id="ruc" value="{{ $perfil->ruc or ''}}" required>
        {!! $errors->first('ruc', '<p class="help-block">:message</p>') !!}
    </div>
</div><div class="form-group {{ $errors->has('email') ? 'has-error' : ''}}">
    <label for="email" class="col-md-4 control-label">{{ 'Email' }}</label>
    <div class="col-md-6">
        <input class="form-control" name="email" type="email" id="email" value="{{ $perfil->email or ''}}" required>
        {!! $errors->first('email', '<p class="help-block">:message</p>') !!}
    </div>
</div><div class="form-group {{ $errors->has('telefono') ? 'has-error' : ''}}">
    <label for="telefono" class="col-md-4 control-label">{{ 'Telefono' }}</label>
    <div class="col-md-6">
        <input class="form-control" name="telefono" type="number" id="telefono" value="{{ $perfil->telefono or ''}}" required>
        {!! $errors->first('telefono', '<p class="help-block">:message</p>') !!}
    </div>
</div><div class="form-group {{ $errors->has('cel_movi') ? 'has-error' : ''}}">
    <label for="cel_movi" class="col-md-4 control-label">{{ 'Cel Movi' }}</label>
    <div class="col-md-6">
        <input class="form-control" name="cel_movi" type="number" id="cel_movi" value="{{ $perfil->cel_movi or ''}}" required>
        {!! $errors->first('cel_movi', '<p class="help-block">:message</p>') !!}
    </div>
</div><div class="form-group {{ $errors->has('cel_claro') ? 'has-error' : ''}}">
    <label for="cel_claro" class="col-md-4 control-label">{{ 'Cel Claro' }}</label>
    <div class="col-md-6">
        <input class="form-control" name="cel_claro" type="number" id="cel_claro" value="{{ $perfil->cel_claro or ''}}" required>
        {!! $errors->first('cel_claro', '<p class="help-block">:message</p>') !!}
    </div>
</div><div class="form-group {{ $errors->has('wts') ? 'has-error' : ''}}">
    <label for="wts" class="col-md-4 control-label">{{ 'Wts' }}</label>
    <div class="col-md-6">
        <input class="form-control" name="wts" type="number" id="wts" value="{{ $perfil->wts or ''}}" required>
        {!! $errors->first('wts', '<p class="help-block">:message</p>') !!}
    </div>
</div><div class="form-group {{ $errors->has('direccion') ? 'has-error' : ''}}">
    <label for="direccion" class="col-md-4 control-label">{{ 'Direccion' }}</label>
    <div class="col-md-6">
        <input class="form-control" name="direccion" type="text" id="direccion" value="{{ $perfil->direccion or ''}}" required>
        {!! $errors->first('direccion', '<p class="help-block">:message</p>') !!}
    </div>
</div><div class="form-group {{ $errors->has('fecha_nacimiento') ? 'has-error' : ''}}">
    <label for="fecha_nacimiento" class="col-md-4 control-label">{{ 'Fecha Nacimiento' }}</label>
    <div class="col-md-6">
        <input class="form-control" name="fecha_nacimiento" type="date" id="fecha_nacimiento" value="{{ $perfil->fecha_nacimiento or ''}}" >
        {!! $errors->first('fecha_nacimiento', '<p class="help-block">:message</p>') !!}
    </div>
</div><div class="form-group {{ $errors->has('tipo_usuario') ? 'has-error' : ''}}">
    <label for="tipo_usuario" class="col-md-4 control-label">{{ 'Tipo Usuario' }}</label>
    <div class="col-md-6">
        <input class="form-control" name="tipo_usuario" type="text" id="tipo_usuario" value="{{ $perfil->tipo_usuario or ''}}" >
        {!! $errors->first('tipo_usuario', '<p class="help-block">:message</p>') !!}
    </div>
</div><div class="form-group {{ $errors->has('estado_civil') ? 'has-error' : ''}}">
    <label for="estado_civil" class="col-md-4 control-label">{{ 'Estado Civil' }}</label>
    <div class="col-md-6">
        <select name="estado_civil" class="form-control" id="estado_civil" >
    @foreach (json_decode('{"1":"Soltero\/a","2":"Casado\/a","3":"Divorciado\/a","4":"Viudo\/a","5":"Union de Hecho"}', true) as $optionKey => $optionValue)
        <option value="{{ $optionKey }}" {{ (isset($perfil->estado_civil) && $perfil->estado_civil == $optionKey) ? 'selected' : ''}}>{{ $optionValue }}</option>
    @endforeach
</select>
        {!! $errors->first('estado_civil', '<p class="help-block">:message</p>') !!}
    </div>
</div><div class="form-group {{ $errors->has('genero') ? 'has-error' : ''}}">
    <label for="genero" class="col-md-4 control-label">{{ 'Genero' }}</label>
    <div class="col-md-6">
        <select name="genero" class="form-control" id="genero" >
    @foreach (json_decode('{"1":"Masculino","0":"Femanino"}', true) as $optionKey => $optionValue)
        <option value="{{ $optionKey }}" {{ (isset($perfil->genero) && $perfil->genero == $optionKey) ? 'selected' : ''}}>{{ $optionValue }}</option>
    @endforeach
</select>
        {!! $errors->first('genero', '<p class="help-block">:message</p>') !!}
    </div>
</div><div class="form-group {{ $errors->has('activo') ? 'has-error' : ''}}">
    <label for="activo" class="col-md-4 control-label">{{ 'Activo' }}</label>
    <div class="col-md-6">
        <select name="activo" class="form-control" id="activo" >
    @foreach (json_decode('{"1":"Activo","0":"Inactivo"}', true) as $optionKey => $optionValue)
        <option value="{{ $optionKey }}" {{ (isset($perfil->activo) && $perfil->activo == $optionKey) ? 'selected' : ''}}>{{ $optionValue }}</option>
    @endforeach
</select>
        {!! $errors->first('activo', '<p class="help-block">:message</p>') !!}
    </div>
</div><div class="form-group {{ $errors->has('pais_id') ? 'has-error' : ''}}">
    <label for="pais_id" class="col-md-4 control-label">{{ 'Pais Id' }}</label>
    <div class="col-md-6">
        <input class="form-control" name="pais_id" type="number" id="pais_id" value="{{ $perfil->pais_id or ''}}" >
        {!! $errors->first('pais_id', '<p class="help-block">:message</p>') !!}
    </div>
</div><div class="form-group {{ $errors->has('provincia_id') ? 'has-error' : ''}}">
    <label for="provincia_id" class="col-md-4 control-label">{{ 'Provincia Id' }}</label>
    <div class="col-md-6">
        <input class="form-control" name="provincia_id" type="number" id="provincia_id" value="{{ $perfil->provincia_id or ''}}" >
        {!! $errors->first('provincia_id', '<p class="help-block">:message</p>') !!}
    </div>
</div><div class="form-group {{ $errors->has('canton_id') ? 'has-error' : ''}}">
    <label for="canton_id" class="col-md-4 control-label">{{ 'Canton Id' }}</label>
    <div class="col-md-6">
        <input class="form-control" name="canton_id" type="number" id="canton_id" value="{{ $perfil->canton_id or ''}}" >
        {!! $errors->first('canton_id', '<p class="help-block">:message</p>') !!}
    </div>
</div>

<div class="form-group">
    <div class="col-md-offset-4 col-md-4">
        <input class="btn btn-primary" type="submit" value="{{ $submitButtonText or 'Create' }}">
    </div>
</div>
