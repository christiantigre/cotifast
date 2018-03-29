<div class="form-group {{ $errors->has('almacen') ? 'has-error' : ''}}">
    <label for="almacen" class="col-md-4 control-label">{{ 'Almacen' }}</label>
    <div class="col-md-6">
        {!! Form::text('almacen', null, ['class' => 'form-control','autofocus'=>'autofocus', 'id'=>'almacen']), old('almacen')  !!}
        {!! $errors->first('almacen', '<p class="help-block">:message</p>') !!}
    </div>
</div><div class="form-group {{ $errors->has('propietario') ? 'has-error' : ''}}">
    <label for="propietario" class="col-md-4 control-label">{{ 'Propietario' }}</label>
    <div class="col-md-6">
        {!! Form::text('propietario', null, ['class' => 'form-control','autofocus'=>'autofocus', 'id'=>'propietario']), old('propietario')  !!}
        {!! $errors->first('propietario', '<p class="help-block">:message</p>') !!}
    </div>
</div><div class="form-group {{ $errors->has('gerente') ? 'has-error' : ''}}">
    <label for="gerente" class="col-md-4 control-label">{{ 'Gerente' }}</label>
    <div class="col-md-6">
        {!! Form::text('gerente', null, ['class' => 'form-control','autofocus'=>'autofocus', 'id'=>'gerente']), old('gerente')  !!}
        {!! $errors->first('gerente', '<p class="help-block">:message</p>') !!}
    </div>
</div><div class="form-group {{ $errors->has('razon_social') ? 'has-error' : ''}}">
    <label for="razon_social" class="col-md-4 control-label">{{ 'Razon Social' }}</label>
    <div class="col-md-6">
        {!! Form::text('razon_social', null, ['class' => 'form-control','autofocus'=>'autofocus', 'id'=>'razon_social']), old('razon_social')  !!}
        {!! $errors->first('razon_social', '<p class="help-block">:message</p>') !!}
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
</div><div class="form-group {{ $errors->has('fecha_inicio') ? 'has-error' : ''}}">
    <label for="fecha_inicio" class="col-md-4 control-label">{{ 'Fecha Inicio' }}</label>
    <div class="col-md-6">
        {!! Form::text('fecha_inicio', null, ['class' => 'form-control datepicker','autofocus'=>'autofocus', 'id'=>'fecha_inicio']), old('fecha_inicio')  !!}
        {!! $errors->first('fecha_inicio', '<p class="help-block">:message</p>') !!}
    </div>
</div><div class="form-group {{ $errors->has('logo') ? 'has-error' : ''}}">
    <label for="logo" class="col-md-4 control-label">{{ 'Logo' }}</label>
    <div class="col-md-6">
        {!! Form::file('logo', null,['id'=>'logo','class'=>'form-control','autofocus'=>'autofocus']), old('logo')    !!}
        {!! $errors->first('logo', '<p class="help-block">:message</p>') !!}
    </div>
</div><div class="form-group {{ $errors->has('slogan') ? 'has-error' : ''}}">
    <label for="slogan" class="col-md-4 control-label">{{ 'Slogan' }}</label>
    <div class="col-md-6">
        {!! Form::textarea('slogan', null, ['id'=>'slogan','class' => 'form-control','autofocus'=>'autofocus']), old('slogan') !!}
        {!! $errors->first('slogan', '<p class="help-block">:message</p>') !!}
    </div>
</div><div class="form-group {{ $errors->has('telefono') ? 'has-error' : ''}}">
    <label for="telefono" class="col-md-4 control-label">{{ 'Telefono' }}</label>
    <div class="col-md-6">
        {!! Form::text('telefono', null, ['class' => 'form-control','autofocus'=>'autofocus', 'id'=>'telefono']), old('telefono')  !!}
        {!! $errors->first('telefono', '<p class="help-block">:message</p>') !!}
    </div>
</div><div class="form-group {{ $errors->has('fax') ? 'has-error' : ''}}">
    <label for="fax" class="col-md-4 control-label">{{ 'Fax' }}</label>
    <div class="col-md-6">
        {!! Form::text('fax', null, ['class' => 'form-control','autofocus'=>'autofocus', 'id'=>'fax']), old('fax')  !!}
        {!! $errors->first('fax', '<p class="help-block">:message</p>') !!}
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
</div><div class="form-group {{ $errors->has('watsapp') ? 'has-error' : ''}}">
    <label for="watsapp" class="col-md-4 control-label">{{ 'Watsapp' }}</label>
    <div class="col-md-6">
        {!! Form::text('watsapp', null, ['class' => 'form-control','autofocus'=>'autofocus', 'id'=>'watsapp']), old('watsapp')  !!}
        {!! $errors->first('watsapp', '<p class="help-block">:message</p>') !!}
    </div>
</div><div class="form-group {{ $errors->has('pag_web') ? 'has-error' : ''}}">
    <label for="pag_web" class="col-md-4 control-label">{{ 'Pag Web' }}</label>
    <div class="col-md-6">

        {!! Form::textarea('pag_web', null, ['id'=>'pag_web','class' => 'form-control','autofocus'=>'autofocus']), old('pag_web') !!}
        {!! $errors->first('pag_web', '<p class="help-block">:message</p>') !!}
    </div>
</div><div class="form-group {{ $errors->has('fb') ? 'has-error' : ''}}">
    <label for="fb" class="col-md-4 control-label">{{ 'Pag. facebbok' }}</label>
    <div class="col-md-6">
        {!! Form::textarea('fb', null, ['id'=>'fb','class' => 'form-control','autofocus'=>'autofocus']), old('fb') !!}
        {!! $errors->first('fb', '<p class="help-block">:message</p>') !!}
    </div>
</div><div class="form-group {{ $errors->has('tw') ? 'has-error' : ''}}">
    <label for="tw" class="col-md-4 control-label">{{ 'Pag. twitter' }}</label>
    <div class="col-md-6">

        {!! Form::textarea('tw', null, ['id'=>'tw','class' => 'form-control','autofocus'=>'autofocus']), old('tw') !!}
        {!! $errors->first('tw', '<p class="help-block">:message</p>') !!}
    </div>
</div><div class="form-group {{ $errors->has('ins') ? 'has-error' : ''}}">
    <label for="ins" class="col-md-4 control-label">{{ 'Pag. instagram' }}</label>
    <div class="col-md-6">

        {!! Form::textarea('ins', null, ['id'=>'ins','class' => 'form-control','autofocus'=>'autofocus']), old('ins') !!}
        {!! $errors->first('ins', '<p class="help-block">:message</p>') !!}
    </div>
</div><div class="form-group {{ $errors->has('gg') ? 'has-error' : ''}}">
    <label for="gg" class="col-md-4 control-label">{{ 'Pag. goolge' }}</label>
    <div class="col-md-6">

        {!! Form::textarea('gg', null, ['id'=>'gg','class' => 'form-control','autofocus'=>'autofocus']), old('gg') !!}
        {!! $errors->first('gg', '<p class="help-block">:message</p>') !!}
    </div>
</div><div class="form-group {{ $errors->has('funcion_empresa') ? 'has-error' : ''}}">
    <label for="funcion_empresa" class="col-md-4 control-label">{{ 'Función Empresa' }}</label>
    <div class="col-md-6">

        {!! Form::textarea('funcion_empresa', null, ['id'=>'funcion_empresa','class' => 'form-control','autofocus'=>'autofocus']), old('funcion_empresa') !!}
        {!! $errors->first('funcion_empresa', '<p class="help-block">:message</p>') !!}
    </div>
</div><div class="form-group {{ $errors->has('dirMatriz') ? 'has-error' : ''}}">
    <label for="dirMatriz" class="col-md-4 control-label">{{ 'Dir. matríz' }}</label>
    <div class="col-md-6">
        {!! Form::textarea('dirMatriz', null, ['id'=>'dirMatriz','class' => 'form-control','autofocus'=>'autofocus']), old('dirMatriz') !!}
        {!! $errors->first('dirMatriz', '<p class="help-block">:message</p>') !!}
    </div>
</div><div class="form-group {{ $errors->has('dirSucursal') ? 'has-error' : ''}}">
    <label for="dirSucursal" class="col-md-4 control-label">{{ 'Dir. Sucursal' }}</label>
    <div class="col-md-6">
        {!! Form::textarea('dirSucursal', null, ['id'=>'dirSucursal','class' => 'form-control','autofocus'=>'autofocus']), old('dirSucursal') !!}
        {!! $errors->first('dirSucursal', '<p class="help-block">:message</p>') !!}
    </div>
</div><div class="form-group {{ $errors->has('latitud') ? 'has-error' : ''}}">
    <label for="latitud" class="col-md-4 control-label">{{ 'Latitud' }}</label>
    <div class="col-md-6">
        {!! Form::text('latitud', null, ['class' => 'form-control','autofocus'=>'autofocus', 'id'=>'latitud']), old('latitud')  !!}
        {!! $errors->first('latitud', '<p class="help-block">:message</p>') !!}
    </div>
</div><div class="form-group {{ $errors->has('longitud') ? 'has-error' : ''}}">
    <label for="longitud" class="col-md-4 control-label">{{ 'Longitud' }}</label>
    <div class="col-md-6">
        {!! Form::text('longitud', null, ['class' => 'form-control','autofocus'=>'autofocus', 'id'=>'longitud']), old('longitud')  !!}
        {!! $errors->first('longitud', '<p class="help-block">:message</p>') !!}
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
<div class="form-group {{ $errors->has('obligado_contabilidad') ? 'has-error' : ''}}">
    <label for="obligado_contabilidad" class="col-md-4 control-label">{{ 'Obligado Contabilidad' }}</label>
    <div class="col-md-6">

        <select name="obligado_contabilidad" class="form-control" id="obligado_contabilidad" >
            @foreach (json_decode('{"1":"SI","0":"NO"}', true) as $optionKey => $optionValue)
            <option value="{{ $optionKey }}" {{ (isset($almecen->obligado_contabilidad) && $almacen->obligado_contabilidad == $optionKey) ? 'selected' : ''}}>{{ $optionValue }}</option>
            @endforeach
        </select>

        {!! $errors->first('obligado_contabilidad', '<p class="help-block">:message</p>') !!}
    </div>
</div>
<div class="form-group {{ $errors->has('path_certificado') ? 'has-error' : ''}}">
    <label for="path_certificado" class="col-md-4 control-label">{{ 'Path Firma Digital' }}</label>
    <div class="col-md-6">
        {!! Form::file('path_certificado', null,['id'=>'path_certificado','class'=>'form-control','autofocus'=>'autofocus']), old('path_certificado')    !!}
        {!! $errors->first('path_certificado', '<p class="help-block">:message</p>') !!}
    </div>
</div><div class="form-group {{ $errors->has('clave_certificado') ? 'has-error' : ''}}">
    <label for="clave_certificado" class="col-md-4 control-label">{{ 'Clave Certificado' }}</label>
    <div class="col-md-6">
        {!! Form::text('clave_certificado', null, ['class' => 'form-control','autofocus'=>'autofocus', 'id'=>'clave_certificado']), old('clave_certificado')  !!}
        {!! $errors->first('clave_certificado', '<p class="help-block">:message</p>') !!}
    </div>
</div><div class="form-group {{ $errors->has('modo_ambiente') ? 'has-error' : ''}}">
    <label for="modo_ambiente" class="col-md-4 control-label">{{ 'Modo Ambiente' }}</label>
    <div class="col-md-6">
        <select name="modo_ambiente" class="form-control" id="modo_ambiente" >
            @foreach (json_decode('{"0":"PRUEBAS","1":"PRODUCCIÓN"}', true) as $optionKey => $optionValue)
            <option value="{{ $optionKey }}" {{ (isset($almecen->modo_ambiente) && $almacen->modo_ambiente == $optionKey) ? 'selected' : ''}}>{{ $optionValue }}</option>
            @endforeach
        </select>
        {!! $errors->first('modo_ambiente', '<p class="help-block">:message</p>') !!}
    </div>
</div><div class="form-group {{ $errors->has('tipo_emision') ? 'has-error' : ''}}">
    <label for="tipo_emision" class="col-md-4 control-label">{{ 'Tipo Emision' }}</label>
    <div class="col-md-6">
        <select name="tipo_emision" class="form-control" id="tipo_emision" >
            @foreach (json_decode('{"0":"Emisión Normal"}', true) as $optionKey => $optionValue)
            <option value="{{ $optionKey }}" {{ (isset($almecen->tipo_emision) && $almacen->tipo_emision == $optionKey) ? 'selected' : ''}}>{{ $optionValue }}</option>
            @endforeach
        </select>
        {!! $errors->first('tipo_emision', '<p class="help-block">:message</p>') !!}
    </div>
</div>
<div class="form-group {{ $errors->has('habilitar_facelectronica') ? 'has-error' : ''}}">
    <label for="habilitar_facelectronica" class="col-md-4 control-label">{{ 'Activar fact. electrónica' }}</label>
    <div class="col-md-6">

        <select name="habilitar_facelectronica" class="form-control" id="habilitar_facelectronica" >
            @foreach (json_decode('{"1":"SI","0":"NO"}', true) as $optionKey => $optionValue)
            <option value="{{ $optionKey }}" {{ (isset($almacen->habilitar_facelectronica) && $almacen->habilitar_facelectronica == $optionKey) ? 'selected' : ''}}>{{ $optionValue }}</option>
            @endforeach
        </select>

        {!! $errors->first('habilitar_facelectronica', '<p class="help-block">:message</p>') !!}
    </div>
</div>

<div class="form-group {{ $errors->has('auth_sri') ? 'has-error' : ''}}">
    <label for="auth_sri" class="col-md-4 control-label">{{ 'Autorización SRI' }}</label>
    <div class="col-md-6">
        {!! Form::text('auth_sri', null, ['class' => 'form-control','autofocus'=>'autofocus', 'id'=>'auth_sri']), old('auth_sri')  !!}
        {!! $errors->first('auth_sri', '<p class="help-block">:message</p>') !!}
    </div>
</div><div class="form-group {{ $errors->has('codestablecimiento') ? 'has-error' : ''}}">
    <label for="codestablecimiento" class="col-md-4 control-label">{{ 'Cod. establecimiento' }}</label>
    <div class="col-md-6">
        {!! Form::text('codestablecimiento', null, ['class' => 'form-control','autofocus'=>'autofocus', 'id'=>'codestablecimiento']), old('codestablecimiento')  !!}
        {!! $errors->first('codestablecimiento', '<p class="help-block">:message</p>') !!}
    </div>
</div><div class="form-group {{ $errors->has('codpntemision') ? 'has-error' : ''}}">
    <label for="codpntemision" class="col-md-4 control-label">{{ 'Cod. punto emisión' }}</label>
    <div class="col-md-6">
        {!! Form::text('codpntemision', null, ['class' => 'form-control','autofocus'=>'autofocus', 'id'=>'codpntemision']), old('codpntemision')  !!}
        {!! $errors->first('codpntemision', '<p class="help-block">:message</p>') !!}
    </div>
</div>
<div class="form-group {{ $errors->has('activo') ? 'has-error' : ''}}">
    <label for="activo" class="col-md-4 control-label">{{ 'Activo' }}</label>
    <div class="col-md-6">
        <select name="activo" class="form-control" id="activo" >
    @foreach (json_decode('{"1":"Activo","0":"Inactivo"}', true) as $optionKey => $optionValue)
        <option value="{{ $optionKey }}" {{ (isset($almacen->activo) && $almacen->activo == $optionKey) ? 'selected' : ''}}>{{ $optionValue }}</option>
    @endforeach
</select>
        {!! $errors->first('activo', '<p class="help-block">:message</p>') !!}
    </div>
</div>

<div class="form-group">
    <div class="col-md-offset-4 col-md-4">
        <input class="btn btn-primary" type="submit" value="{{ $submitButtonText or 'Guardar' }}">
    </div>
</div>

<script type="text/javascript">
    $('.datepicker').datepicker({
    format: "yyyy/mm/dd",
    language: "es",
    autoclose: true
});
</script>