<div class="form-group {{ $errors->has('pre_venta') ? 'has-error' : ''}}">
    <label for="pre_venta" class="col-md-4 control-label">{{ 'Descuento' }}</label>
    <div class="col-md-6">
        {!! Form::text('descuento', null, ['class' => 'form-control','autofocus'=>'autofocus', 'id'=>'descuento']), old('descuento')  !!}
        {!! $errors->first('pre_venta', '<p class="help-block">:message</p>') !!}
    </div>
</div><div class="form-group {{ $errors->has('detalle') ? 'has-error' : ''}}">
    <label for="detalle" class="col-md-4 control-label">{{ 'Detalle' }}</label>
    <div class="col-md-6">
        {!! Form::textarea('detalle', null, ['id'=>'detalle','class' => 'form-control','autofocus'=>'autofocus']), old('detalle') !!}
        {!! $errors->first('detalle', '<p class="help-block">:message</p>') !!}
    </div>
</div><div class="form-group {{ $errors->has('activo') ? 'has-error' : ''}}">
    <label for="activo" class="col-md-4 control-label">{{ 'Activo' }}</label>
    <div class="col-md-6">
        <select name="activo" class="form-control" id="activo" >
    @foreach (json_decode('{"1":"SI","0":"NO"}', true) as $optionKey => $optionValue)
        <option value="{{ $optionKey }}" {{ (isset($descuento->activo) && $descuento->activo == $optionKey) ? 'selected' : ''}}>{{ $optionValue }}</option>
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
