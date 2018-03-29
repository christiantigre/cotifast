@extends('adminlte::page')
@section('content')
@include('errors.messages')
        <div class="row">
            <div class="col-md-12 col-lg-12 col-xs-12 col-sm-12">
                <div class="panel panel-default">
                    <div class="panel-heading">Almacen {{ $almacen->almacen }}</div>
                    <div class="panel-body">
                        <a href="{{ url('/admin/almacen') }}" title="Atras"><button class="btn btn-warning btn-xs"><i class="fa fa-arrow-left" aria-hidden="true"></i> Atras</button></a>
                        <a href="{{ url('/admin/almacen/' . $almacen->id . '/edit') }}" title="Editar Almacen"><button class="btn btn-primary btn-xs"><i class="fa fa-pencil-square-o" aria-hidden="true"></i> Editar</button></a>
                        {{--
                        <form method="POST" action="{{ url('admin/almacen' . '/' . $almacen->id) }}" accept-charset="UTF-8" style="display:inline">
                            {{ method_field('DELETE') }}
                            {{ csrf_field() }}
                            <button type="submit" class="btn btn-danger btn-xs" title="Delete Almacen" onclick="return confirm(&quot;Confirm delete?&quot;)"><i class="fa fa-trash-o" aria-hidden="true"></i> Delete</button>
                        </form>
                        --}}
                        <br/>
                        <br/>
                        <div class="table-responsive">
                            <table class="table table-borderless">
                                <tbody>
                                    <tr><th>ID</th><td>{{ $almacen->id }}</td></tr>
                                    <tr><th> Almacen </th><td> {{ $almacen->almacen }} </td></tr>
                                    <tr><th> Propietario </th><td> {{ $almacen->propietario }} </td></tr>
                                    <tr><th> Gerente </th><td> {{ $almacen->gerente }} </td></tr>
                                    <tr><th> Pagina web </th><td> {{ $almacen->pag_web }} </td></tr>
                                    <tr><th> Razon social </th><td> {{ $almacen->razon_social }} </td></tr>
                                    <tr><th> Ruc </th><td> {{ $almacen->ruc }} </td></tr>
                                    <tr><th> Email </th><td> {{ $almacen->email }} </td></tr>
                                    <tr>
                                    <th> Fecha inicio </th><td> 
                                        {{ $almacen->fecha_inicio }} 
                                        ({{ $almacen->created_at->diffForHumans() }})
                                    </td></tr>

                                    <tr><th> Logo </th><td> 
                                         @if(empty($almacen->logo))
                                            <center>-</center>
                                            @else
                                            <a href="{{ asset($almacen->logo) }}">
                                            <img src="{{ asset($almacen->logo) }}" class="img img-responsive">
                                            </a>
                                            @endif
                                    </td></tr>
                                    <tr><th> Slogan </th><td> {{ $almacen->slogan }} </td></tr>                                    
                                    <tr>
                                    <tr><th> Telefono </th><td> {{ $almacen->telefono }} </td></tr>
                                    <tr><th> Celular movistar </th><td> {{ $almacen->cel_movi }} </td></tr>
                                    <tr><th> Celular claro </th><td> {{ $almacen->cel_claro }} </td></tr>
                                    <tr><th> Watsapp </th><td> {{ $almacen->watsapp }} </td></tr>
                                    <tr><th> Facebook </th><td> {{ $almacen->fb }} </td></tr>
                                    <tr><th> Twitter </th><td> {{ $almacen->tw }} </td></tr>
                                    <tr><th> Instagram </th><td> {{ $almacen->ins }} </td></tr>
                                    <tr><th> Google + </th><td> {{ $almacen->gg }} </td></tr>
                                    <tr><th> Detalle almacen </th><td> {{ $almacen->funcion_empresa }} </td></tr>
                                    <tr><th> Dirección Matríz</th><td> {{ $almacen->dirMatriz }} </td></tr>
                                    <tr><th> Dirección Sucursal</th><td> {{ $almacen->dirSucursal }} </td></tr>
                                    <tr><th> Latitud </th><td> {{ $almacen->latitud }} </td></tr>
                                    <tr><th> Longitud </th><td> {{ $almacen->longitud }} </td></tr>
                                    <tr><th> Pais </th><td> {{ $almacen->pais->pais }} </td></tr>
                                    <tr><th> Provincia </th><td> {{ $almacen->provincia->provincia }} </td></tr>
                                    <tr><th> Canton </th><td> {{ $almacen->canton->canton }} </td></tr>
                                    <tr><th> Obligado Contabilidad </th><td> 
                                        @if(($almacen->obligado_contabilidad)=='0')
                                            <small class="label pull-left bg-green">No Obligado</small>
                                        @else
                                            <small class="label pull-left bg-red">Obligado</small>
                                        @endif
                                    </td></tr>
                                    <tr><th> Ruta Certificado </th><td> {{ $almacen->path_certificado }} </td></tr>
                                    <tr><th> Clave Certificado </th><td> {{ $almacen->clave_certificado }} </td></tr>
                                    <tr><th> Modo Ambiente </th><td> 
                                        @if(($almacen->modo_ambiente)=='0')
                                            <small class="label pull-left bg-green">PRUEBAS</small>
                                        @else
                                            <small class="label pull-left bg-red">PRODUCCIÓN</small>
                                        @endif
                                    </td></tr>
                                    <tr><th> Tipo Emisión </th><td> 
                                        @if(($almacen->modo_ambiente)=='0')
                                            <small class="label pull-left bg-green">Emisión Normal</small>
                                        @else
                                            <small class="label pull-left bg-red">Otra</small>
                                        @endif
                                    </td></tr>
                                    <tr><th> Facturación electrónica </th><td> 
                                        @if(($almacen->habilitar_facelectronica)=='0')
                                            <small class="label pull-left bg-green">Deshabilitado</small>
                                        @else
                                            <small class="label pull-left bg-red">Habilitado</small>
                                        @endif
                                    </td></tr>
                                    <tr><th> Auth SRI </th><td> {{ $almacen->auth_sri }} </td></tr>
                                    <tr><th> Cod: Establecimiento </th><td> {{ $almacen->codestablecimiento }} </td></tr>
                                    <tr><th> Cod: Punto Emisión </th><td> {{ $almacen->codpntemision }} </td></tr>
                                    <tr><th> Activo </th><td> 
                                        @if(($almacen->activo)=='1')
                                            <small class="label pull-left bg-green">Activado</small>
                                        @else
                                            <small class="label pull-left bg-red">Desactivado</small>
                                        @endif
                                    </td></tr>
                                </tbody>
                            </table>
                        </div>

                    </div>
                </div>
            </div>
        </div>
@endsection