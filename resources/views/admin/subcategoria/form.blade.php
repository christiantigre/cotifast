<div class="form-group {{ $errors->has('provincia_id') ? 'has-error' : ''}}">
    <label for="provincia_id" class="col-md-4 control-label">{{ 'Categoría' }}</label>
    <div class="col-md-6">
        {!! Form::select('categoria_id', $categorias, null, ['class' => 'form-control','autofocus'=>'autofocus','id'=>'categoria_id']) !!}
        {!! $errors->first('categoria_id', '<p class="help-block">:message</p>') !!}
    </div>
</div>
<div class="form-group {{ $errors->has('Subcategoria') ? 'has-error' : ''}}">
    <label for="Subcategoria" class="col-md-4 control-label">{{ 'Subcategoría' }}</label>
    <div class="col-md-6">
        {!! Form::text('Subcategoria', null, ['class' => 'form-control','autofocus'=>'autofocus', 'id'=>'Subcategoria']), old('Subcategoria')  !!}
        {!! $errors->first('Subcategoria', '<p class="help-block">:message</p>') !!}
    </div>
</div><div class="form-group {{ $errors->has('detalle') ? 'has-error' : ''}}">
    <label for="detalle" class="col-md-4 control-label">{{ 'Detalle' }}</label>
    <div class="col-md-6">
        {!! Form::text('detalle', null, ['class' => 'form-control','autofocus'=>'autofocus', 'id'=>'detalle']), old('detalle')  !!}
        {!! $errors->first('detalle', '<p class="help-block">:message</p>') !!}
    </div>
</div><div class="form-group {{ $errors->has('activo') ? 'has-error' : ''}}">
    <label for="activo" class="col-md-4 control-label">{{ 'Activo' }}</label>
    <div class="col-md-6">
        <select name="activo" class="form-control" id="activo" >
    @foreach (json_decode('{"1":"Activo","0":"Inactivo"}', true) as $optionKey => $optionValue)
        <option value="{{ $optionKey }}" {{ (isset($subcategorium->activo) && $subcategorium->activo == $optionKey) ? 'selected' : ''}}>{{ $optionValue }}</option>
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
