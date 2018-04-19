
<div class="col-md-12">
    <a href="" data-toggle="modal" data-target="#modal-seleccionacliente" class="btn btn-default btn-sm" title="Buscar Cliente">
        <i class="fa fa-search" aria-hidden="true"></i> Buscar Cliente
    </a>
    <button class="btn btn-default btn-sm" onclick="reset_input();" id="" type="button"><i class="fa fa-search" aria-hidden="true"></i> Reset Cliente</button>
    
    <div class="form-group {{ $errors->has('numero_proforma') ? 'has-error' : ''}}">
        <label for="fecha" class="col-md-9 control-label">{{ 'N° Proforma:' }}</label>
        <div class="col-md-3">            
            <input class="form-control input-sm" name="idproforma" type="hidden" id="idproforma" value="{{ $cant_incr}}">
            <input class="form-control input-sm" name="secuencial_proforma" type="hidden" id="secuencial_proforma" value="{{ $numero_proforma}}">
            <label for="fecha" class="col-md-9 control-label">{{ $numero_proforma }}</label>            
            {!! $errors->first('numero_proforma', '<p class="help-block">:message</p>') !!}
        </div>
    </div>
    <div class="form-group {{ $errors->has('fecha_proforma') ? 'has-error' : ''}}">
        <label for="fecha_proforma" class="col-md-9 control-label">{{ 'Fecha:' }}</label>
        <div class="col-md-3">
            <label for="fecha_proforma" class="col-md-9 control-label">{{ $fecha_proforma }}</label>            
            <input class="form-control input-sm" name="fecha_proforma" type="hidden" id="fecha_proforma" value="{{ $fecha_proforma or ''}}" >
            {!! $errors->first('fecha_proforma', '<p class="help-block">:message</p>') !!}
        </div>
    </div>
    <div class="form-group {{ $errors->has('vendedor') ? 'has-error' : ''}}">
        <label for="vendedor" class="col-md-9 control-label">{{ 'Emíte:' }}</label>
        <div class="col-md-3">
            <label for="vendedor" class="col-md-9 control-label">{{ $username }}</label>            
            <label for="vendedor" class="col-md-9 control-label">{{ $useremail }}</label>            
            <input class="form-control input-sm" name="vendedor" type="hidden" id="vendedor" value="{{ $userid }}" >
        </div>
    </div>
</div>
<div class="col-md-12">
    CLIENTE / EMPRESA
    <fieldset>
        <legend>
        </legend>
        <div class="col-md-6">
            <div class="form-group {{ $errors->has('cliente') ? 'has-error' : ''}}">
                <label for="cliente" class="col-md-4 control-label">{{ 'NOMBRE' }}</label>
                <div class="col-md-8">
                 <input class="form-control input-sm" name="cliente_id" type="hidden" id="cliente_id" value="{{ $ventum->id_cliente or ''}}" >
                 <input class="form-control input-sm" name="cliente" type="text" id="cliente" value="{{ $ventum->cliente or ''}}" >
                 {!! $errors->first('cliente', '<p class="help-block">:message</p>') !!}
             </div>
         </div>
         <div class="form-group {{ $errors->has('documento_id') ? 'has-error' : ''}}">
            <label for="documento_id" class="col-md-4 control-label">{{ 'DOCUMENTO' }}</label>
            <div class="col-xs-4">
                <input class="form-control input-sm" name="documento_ruc" type="text" id="documento_ruc" value="{{ $ventum->documento_ruc or ''}}" placeholder="RUC">
                {!! $errors->first('documento_ruc', '<p class="help-block">:message</p>') !!}
            </div>
            <div class="col-xs-4">
                <input class="form-control input-sm" name="documento_ced" type="text" id="documento_ced" value="{{ $ventum->documento_ced or ''}}" placeholder="CC">
                {!! $errors->first('documento_ced', '<p class="help-block">:message</p>') !!}
            </div>
        </div>
        <div class="form-group {{ $errors->has('destinatario_mail') ? 'has-error' : ''}}">
            <label for="destinatario_mail" class="col-md-4 control-label">{{ 'CORREO' }}</label>
            <div class="col-md-8">
                <input class="form-control input-sm" name="destinatario_mail" type="text" id="destinatario_mail" value="{{ $ventum->destinatario_mail or ''}}" >
                {!! $errors->first('destinatario_mail', '<p class="help-block">:message</p>') !!}
            </div>
        </div>
    </div>

    <div class="col-md-6">
        <div class="form-group {{ $errors->has('contactos') ? 'has-error' : ''}}">
            <label for="contactos" class="col-md-4 control-label">{{ 'CONTACTO' }}</label>
            <div class="col-md-6">
                <input class="form-control input-sm" name="contactos" type="text" id="contactos" value="{{ $ventum->contactos or ''}}" >
                {!! $errors->first('contactos', '<p class="help-block">:message</p>') !!}
            </div>
        </div>
        <div class="form-group {{ $errors->has('direccion_cliente') ? 'has-error' : ''}}">
            <label for="direccion_cliente" class="col-md-4 control-label">{{ 'DIRECCIÓN' }}</label>
            <div class="col-md-8">
                <input class="form-control input-sm" name="direccion_cliente" type="text" id="direccion_cliente" value="{{ $ventum->direccion_cliente or ''}}" >
                {!! $errors->first('direccion_cliente', '<p class="help-block">:message</p>') !!}
            </div>
        </div>  
    </div>

    

</fieldset>
</div>
<div class="col-md-12">
    
    <div class="col-md-6">
        <div class="form-group {{ $errors->has('detalles_proforma') ? 'has-error' : ''}}">
            <label for="detalles_proforma" class="col-md-4 control-label">{{ 'DETALLES' }}</label>
            <div class="col-md-8">
                {!! Form::textarea('detalles_proforma', null, ['id'=>'detalles_proforma','class' => 'form-control input-sm','autofocus'=>'autofocus']), old('propaganda') !!}
                {!! $errors->first('detalles_proforma', '<p class="help-block">:message</p>') !!}
            </div>
        </div>
    </div>

</div>
<div class="col-md-6">

   
</div>


<div class="col-md-12"> 
    PRODUCTO
    <fieldset>
        <legend>
        </legend>
        <!--boton id=buscarproducto abre modal id=modal-seleccionaproductos(archivo admin/venta/modalselect_prod) llamado por data-target=modal-seleccionaproductos -->
        <button class="btn btn-default btn-sm" id="buscarproducto" type="button" data-toggle="modal" data-target="#modal-seleccionaproductos"><i class="fa fa-search" aria-hidden="true"></i> Buscar Producto</button>
        
        <button class="btn btn-default btn-sm" id="trashitems" type="button" onClick="trashPerson(this.id);"><i class="fa fa-trash" aria-hidden="true"></i> Vaciar</button>
        
        <!-- /.box-header -->
        <div class="box-body no-padding">
          <div id="list-cart">
          </div>             
      </div>
      <!-- /.box-body -->
      <!-- /.box -->
  </fieldset>
</div>
<!-- /.col -->



<div class="form-group">
    <div class="col-lg-offset-10 col-md-offset-10 col-sm-offset-8 col-xs-offset-8 col-md-4 col-lg-4 col-sm-12 col-xs-12">
        <input class="btn btn-success" type="submit" value="{{ $submitButtonText or 'Guardar Proforma' }}">
    </div>
</div>

