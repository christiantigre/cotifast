@extends('adminlte::page')
@section('content')
@include('errors.messages')
        <div class="row">
            <div class="col-md-12 col-lg-12 col-xs-12 col-sm-12">
                <div class="panel panel-default">
                    <div class="panel-heading">Proforma N#.- {{ $proforma->secuencial_proforma }}</div>
                    <div class="panel-body">

                        <a href="{{ url('/admin/proforma') }}" title="Atras"><button class="btn btn-warning btn-sm"><i class="fa fa-arrow-left" aria-hidden="true"></i> Atras</button></a>
                        <a href="{{ url('/admin/proforma/' . $proforma->id . '/edit') }}" title="Editar proforma"><button class="btn btn-primary btn-sm"><i class="fa fa-pencil-square-o" aria-hidden="true"></i> Editar</button></a>

                        <form method="POST" action="{{ url('admin/proforma' . '/' . $proforma->id) }}" accept-charset="UTF-8" style="display:inline">
                            {{ method_field('DELETE') }}
                            {{ csrf_field() }}
                            <button type="submit" class="btn btn-danger btn-sm" title="Eliminar proforma" onclick="return confirm(&quot;Confirm delete?&quot;)"><i class="fa fa-trash-o" aria-hidden="true"></i> Eliminar</button>
                        </form>
                        <br/>
                        <br/>

                        <div class="table-responsive">
                            <table class="table">
                                <tbody>
                                    <tr>
                                        <th>ID</th><td>{{ $proforma->id }}</td>
                                    </tr>
                                    <tr>
                                        <th> Fecha Proforma </th><td> {{ $proforma->fecha_proforma }} </td>
                                    </tr>
                                    <tr>
                                        <th> Total </th><td> {{ $proforma->total }} </td>
                                    </tr>
                                    <tr>
                                        <th> Correo de envío </th><td> {{ $proforma->destinatario_mail }} </td>
                                    </tr>
                                    <tr>
                                        <th> Detalles </th><td> {{ $proforma->detalles_proforma }} </td>
                                    </tr>
                                    <tr>
                                        <th> Cliente / Empresa </th><td> {{ $proforma->cliente }} </td>
                                    </tr>                                    
                                    <tr>
                                        <th> Contactos </th><td> {{ $proforma->contactos }} </td>
                                    </tr>
                                    <tr>
                                        <th> Documento </th><td> 
                                            {{ $proforma->documento_ruc }} / {{ $proforma->documento_ced }} 
                                        </td>
                                    </tr>
                                    <tr>
                                        <th> Dirección </th><td> {{ $proforma->direccion_cliente }} </td>
                                    </tr>
                                    <tr>
                                        <th> Estado </th><td> 
                                        @if(($proforma->enviado)=='1')
                                            <small class="label pull-left bg-green">ENVIADO</small>
                                        @else
                                            <small class="label pull-left bg-red">NO ENVIADO</small>
                                        @endif
                                    </td>
                                    </tr>
                                </tbody>
                            </table>
                        </div>

                    </div>
                </div>
            </div>
        </div>
@endsection
