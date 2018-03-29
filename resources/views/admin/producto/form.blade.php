<div class="form-group {{ $errors->has('producto') ? 'has-error' : ''}}">
    <label for="producto" class="col-md-4 control-label">{{ 'Producto' }}</label>
    <div class="col-md-6">
        {!! Form::text('producto', null, ['class' => 'form-control','autofocus'=>'autofocus', 'id'=>'producto']), old('producto')  !!}
        {!! $errors->first('producto', '<p class="help-block">:message</p>') !!}
    </div>
</div><div class="form-group {{ $errors->has('cod_barra') ? 'has-error' : ''}}">
    <label for="cod_barra" class="col-md-4 control-label">{{ 'Cod Barra' }}</label>
    <div class="col-md-6">
        {!! Form::text('cod_barra', null, ['class' => 'form-control','autofocus'=>'autofocus', 'id'=>'cod_barra']), old('cod_barra')  !!}
        {!! $errors->first('cod_barra', '<p class="help-block">:message</p>') !!}
    </div>
</div><div class="form-group {{ $errors->has('pre_compra') ? 'has-error' : ''}}">
    <label for="pre_compra" class="col-md-4 control-label">{{ 'Pre Compra' }}</label>
    <div class="col-md-6">
        {!! Form::text('pre_compra', null, ['class' => 'form-control','autofocus'=>'autofocus', 'id'=>'pre_compra']), old('pre_compra')  !!}
        {!! $errors->first('pre_compra', '<p class="help-block">:message</p>') !!}
    </div>
</div><div class="form-group {{ $errors->has('pre_venta') ? 'has-error' : ''}}">
    <label for="pre_venta" class="col-md-4 control-label">{{ 'Pre Venta' }}</label>
    <div class="col-md-6">
        {!! Form::text('pre_venta', null, ['class' => 'form-control','autofocus'=>'autofocus', 'id'=>'pre_venta']), old('pre_venta')  !!}
        {!! $errors->first('pre_venta', '<p class="help-block">:message</p>') !!}
    </div>
</div><div class="form-group {{ $errors->has('cantidad') ? 'has-error' : ''}}">
    <label for="cantidad" class="col-md-4 control-label">{{ 'Cantidad' }}</label>
    <div class="col-md-6">

        {!! Form::text('cantidad', null, ['class' => 'form-control','autofocus'=>'autofocus', 'id'=>'cantidad']), old('cantidad')  !!}
        {!! $errors->first('cantidad', '<p class="help-block">:message</p>') !!}
    </div>
</div><div class="form-group {{ $errors->has('fecha_ingreso') ? 'has-error' : ''}}">
    <label for="fecha_ingreso" class="col-md-4 control-label">{{ 'Fecha Ingreso' }}</label>
    <div class="col-md-6">
        {!! Form::text('fecha_ingreso', null, ['class' => 'form-control datepicker','autofocus'=>'autofocus', 'id'=>'fecha_ingreso']), old('fecha_ingreso')  !!}
        {!! $errors->first('fecha_ingreso', '<p class="help-block">:message</p>') !!}
    </div>
</div><div class="form-group {{ $errors->has('compras') ? 'has-error' : ''}}">
    <label for="compras" class="col-md-4 control-label">{{ 'Compras' }}</label>
    <div class="col-md-6">
        {!! Form::text('compras', null, ['class' => 'form-control datepicker','autofocus'=>'autofocus', 'id'=>'compras']), old('compras')  !!}
        {!! $errors->first('compras', '<p class="help-block">:message</p>') !!}
    </div>
</div><div class="form-group {{ $errors->has('ventas') ? 'has-error' : ''}}">
    <label for="ventas" class="col-md-4 control-label">{{ 'Ventas' }}</label>
    <div class="col-md-6">
        {!! Form::text('ventas', null, ['class' => 'form-control datepicker','autofocus'=>'autofocus', 'id'=>'ventas']), old('ventas')  !!}
        {!! $errors->first('ventas', '<p class="help-block">:message</p>') !!}
    </div>
</div><div class="form-group {{ $errors->has('saldo') ? 'has-error' : ''}}">
    <label for="saldo" class="col-md-4 control-label">{{ 'Saldo' }}</label>
    <div class="col-md-6">
        {!! Form::text('saldo', null, ['class' => 'form-control datepicker','autofocus'=>'autofocus', 'id'=>'saldo']), old('saldo')  !!}
        
        {!! $errors->first('saldo', '<p class="help-block">:message</p>') !!}
    </div>
</div><div class="form-group {{ $errors->has('imagen') ? 'has-error' : ''}}">
    <label for="imagen" class="col-md-4 control-label">{{ 'Imagen' }}</label>
    <div class="col-md-6">
         {!! Form::file('imagen', null,['id'=>'imagen','class'=>'form-control','autofocus'=>'autofocus']), old('imagen')    !!}
        {!! $errors->first('imagen', '<p class="help-block">:message</p>') !!}
    </div>
</div><div class="form-group {{ $errors->has('nuevo') ? 'has-error' : ''}}">
    <label for="nuevo" class="col-md-4 control-label">{{ 'Nuevo' }}</label>
    <div class="col-md-6">
        <select name="nuevo" class="form-control" id="nuevo" >
    @foreach (json_decode('{"1":"SI","0":"NO"}', true) as $optionKey => $optionValue)
        <option value="{{ $optionKey }}" {{ (isset($producto->nuevo) && $producto->nuevo == $optionKey) ? 'selected' : ''}}>{{ $optionValue }}</option>
    @endforeach
</select>
        {!! $errors->first('nuevo', '<p class="help-block">:message</p>') !!}
    </div>
</div><div class="form-group {{ $errors->has('promocion') ? 'has-error' : ''}}">
    <label for="promocion" class="col-md-4 control-label">{{ 'Promocion' }}</label>
    <div class="col-md-6">
        <select name="promocion" class="form-control" id="promocion" >
    @foreach (json_decode('{"1":"SI","0":"NO"}', true) as $optionKey => $optionValue)
        <option value="{{ $optionKey }}" {{ (isset($producto->promocion) && $producto->promocion == $optionKey) ? 'selected' : ''}}>{{ $optionValue }}</option>
    @endforeach
</select>
        {!! $errors->first('promocion', '<p class="help-block">:message</p>') !!}
    </div>
</div><div class="form-group {{ $errors->has('catalogo') ? 'has-error' : ''}}">
    <label for="catalogo" class="col-md-4 control-label">{{ 'Catalogo' }}</label>
    <div class="col-md-6">
        <select name="catalogo" class="form-control" id="catalogo" >
    @foreach (json_decode('{"1":"SI","0":"NO"}', true) as $optionKey => $optionValue)
        <option value="{{ $optionKey }}" {{ (isset($producto->catalogo) && $producto->catalogo == $optionKey) ? 'selected' : ''}}>{{ $optionValue }}</option>
    @endforeach
</select>
        {!! $errors->first('catalogo', '<p class="help-block">:message</p>') !!}
    </div>
</div><div class="form-group {{ $errors->has('activo') ? 'has-error' : ''}}">
    <label for="activo" class="col-md-4 control-label">{{ 'Activo' }}</label>
    <div class="col-md-6">
        <select name="activo" class="form-control" id="activo" >
    @foreach (json_decode('{"1":"Activo","0":"Inactivo"}', true) as $optionKey => $optionValue)
        <option value="{{ $optionKey }}" {{ (isset($producto->activo) && $producto->activo == $optionKey) ? 'selected' : ''}}>{{ $optionValue }}</option>
    @endforeach
</select>
        {!! $errors->first('activo', '<p class="help-block">:message</p>') !!}
    </div>
</div><div class="form-group {{ $errors->has('propaganda') ? 'has-error' : ''}}">
    <label for="propaganda" class="col-md-4 control-label">{{ 'Propaganda' }}</label>
    <div class="col-md-6">
        {!! Form::textarea('propaganda', null, ['id'=>'propaganda','class' => 'form-control','autofocus'=>'autofocus']), old('propaganda') !!}
        {!! $errors->first('propaganda', '<p class="help-block">:message</p>') !!}
    </div>
</div><div class="form-group {{ $errors->has('categoria_id') ? 'has-error' : ''}}">
    <label for="categoria_id" class="col-md-4 control-label">{{ 'Categoría' }}</label>
    <div class="col-md-6">
        {!! Form::select('categoria_id', $categorias, null, ['class' => 'form-control','autofocus'=>'autofocus','id'=>'categoria_id']) !!}
        {!! $errors->first('categoria_id', '<p class="help-block">:message</p>') !!}
    </div>
</div><div class="form-group {{ $errors->has('subcategoria_id') ? 'has-error' : ''}}">
    <label for="subcategoria_id" class="col-md-4 control-label">{{ 'Subcategoría' }}</label>
    <div class="col-md-6">
        {!! Form::select('subcategoria_id', $subcategorias, null, ['class' => 'form-control','autofocus'=>'autofocus','id'=>'subcategoria_id']) !!}
        {!! $errors->first('subcategoria_id', '<p class="help-block">:message</p>') !!}
    </div>
</div><div class="form-group {{ $errors->has('marca_id') ? 'has-error' : ''}}">
    <label for="marca_id" class="col-md-4 control-label">{{ 'Marca' }}</label>
    <div class="col-md-6">
        {!! Form::select('marca_id', $marcas, null, ['class' => 'form-control','autofocus'=>'autofocus','id'=>'marca_id']) !!}
        {!! $errors->first('marca_id', '<p class="help-block">:message</p>') !!}
    </div>
</div>

<div class="form-group">
    <div class="col-md-offset-4 col-md-4">
        <input class="btn btn-primary" type="submit" value="{{ $submitButtonText or 'Create' }}">
    </div>
</div>

<script type="text/javascript">
    $('.datepicker').datepicker({
    format: "yyyy/mm/dd",
    language: "es",
    autoclose: true
});
</script>