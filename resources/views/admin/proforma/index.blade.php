@extends('adminlte::page')
@section('content')
@include('errors.messages')
        <div class="row">

            <div class="col-md-12 col-lg-12 col-sm-12 col-xs-12">
                <div class="panel panel-default">
                    <div class="panel-heading">Proforma</div>
                    <div class="panel-body">
                        <a href="{{ url('/admin/proforma/create') }}" class="btn btn-success btn-sm" title="Nuevo proforma">
                            <i class="fa fa-plus" aria-hidden="true"></i> Nueva 
                        </a>

                        <form method="GET" action="{{ url('/admin/proforma') }}" accept-charset="UTF-8" class="navbar-form navbar-right" role="search">
                            <div class="input-group">
                                <input type="text" class="form-control" name="search" placeholder="Buscar..." value="{{ request('search') }}">
                                <span class="input-group-btn">
                                    <button class="btn btn-default" type="submit">
                                        <i class="fa fa-search"></i>
                                    </button>
                                </span>
                            </div>
                        </form>

                        <br/>
                        <br/>
                        <div class="col-md-12 col-lg-12 col-sm-12 col-xs-12">
                        
                        <div class="table-responsive">
                            <table class="table">
                                <thead>
                                    <tr>
                                        <th>#</th>
                                        <th>Proforma</th>
                                        <th>Fecha</th>
                                        <th>Valor</th>
                                        <th>Cliente</th>
                                        <th>Enviado</th>
                                        <th>Actions</th>
                                    </tr>
                                </thead>
                                <tbody>
                                @foreach($proforma as $item)
                                    <tr>
                                        <td>{{ $loop->iteration or $item->id }}</td>
                                        <td>{{ $item->secuencial_proforma }}</td>
                                        <td>{{ $item->fecha_proforma }}</td>
                                        <td>{{ $item->total }}</td>
                                        <td>{{ $item->cliente }}</td>
                                        <td>@if(($item->enviado)=='1')
                                    <small class="label label-success">ENVIADO</small>
                                    @else
                                    <small class="label label-danger">NO ENVIADO</small>
                                    @endif</td>
                                        <td>
                                            <a href="{{ url('/admin/proforma/' . $item->id) }}" title="Ver proforma"><button class="btn btn-info btn-sm"><i class="fa fa-eye" aria-hidden="true"></i> Ver</button></a>
                                            <a href="{{ url('/admin/proforma/' . $item->id . '/edit') }}" title="Editar proforma"><button class="btn btn-primary btn-sm"><i class="fa fa-pencil-square-o" aria-hidden="true"></i> Editar</button></a>

                                            <form method="POST" action="{{ url('/admin/proforma' . '/' . $item->id) }}" accept-charset="UTF-8" style="display:inline">
                                                {{ method_field('DELETE') }}
                                                {{ csrf_field() }}
                                                <button type="submit" class="btn btn-danger btn-sm" title="Eliminar proforma" onclick="return confirm(&quot;Confirma eliminar?&quot;)"><i class="fa fa-trash-o" aria-hidden="true"></i> Eliminar</button>
                                            </form>
                                        </td>
                                    </tr>
                                @endforeach
                                </tbody>
                            </table>
                            <div class="pagination-wrapper"> {!! $proforma->appends(['search' => Request::get('search')])->render() !!} </div>
                        </div>

                        </div>

                    </div>
                </div>
            </div>
        </div>
@endsection
