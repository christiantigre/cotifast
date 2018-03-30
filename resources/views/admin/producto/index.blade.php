@extends('adminlte::page')
@section('content')
@include('errors.messages')
        <div class="row">

            <div class="col-md-12 col-lg-12 col-sm-12 col-xs-12">
                <div class="panel panel-default">
                    <div class="panel-heading">Producto</div>
                    <div class="panel-body">
                        <a href="{{ url('/admin/producto/create') }}" class="btn btn-success btn-sm" title="Nuevo Producto">
                            <i class="fa fa-plus" aria-hidden="true"></i> Nuevo
                        </a>

                        <form method="GET" action="{{ url('/admin/categoria') }}" accept-charset="UTF-8" class="navbar-form navbar-right" role="search">
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
                                        <th>Imagen</th>
                                        <th>Producto</th>
                                        <th>Cod Barra</th>
                                        <th>Precio al cliente
                                        <th>Actions</th>
                                    </tr>
                                </thead>
                                <tbody>
                                @foreach($producto as $item)
                                    <tr>
                                        <td>{{ $loop->iteration or $item->id }}</td>
                                        <td>
                                            @if(empty($item->imagen))
                                   <center>-</center>
                                   @else
                                   <a href="{{ asset($item->imagen) }}" target="_blanck">
                                    <img src="{{ asset($item->imagen) }}" class="navbar-brand img-responsive img-circle brand-centered">
                                </a>
                                @endif
                                        </td>
                                        <td>{{ $item->producto }}</td><td>{{ $item->cod_barra }}</td><td>{{ number_format($item->pre_venta,2)}}</td>
                                        <td>
                                            <a href="{{ url('/admin/producto/' . $item->id) }}" title="Ver Producto"><button class="btn btn-info btn-sm"><i class="fa fa-eye" aria-hidden="true"></i> Ver</button></a>
                                            <a href="{{ url('/admin/producto/' . $item->id . '/edit') }}" title="Editar Producto"><button class="btn btn-primary btn-sm"><i class="fa fa-pencil-square-o" aria-hidden="true"></i> Editar</button></a>

                                            <form method="POST" action="{{ url('/admin/producto' . '/' . $item->id) }}" accept-charset="UTF-8" style="display:inline">
                                                {{ method_field('DELETE') }}
                                                {{ csrf_field() }}
                                                <button type="submit" class="btn btn-danger btn-sm" title="Eliminar Producto" onclick="return confirm(&quot;Confirm delete?&quot;)"><i class="fa fa-trash-o" aria-hidden="true"></i> Eliminar</button>
                                            </form>
                                        </td>
                                    </tr>
                                @endforeach
                                </tbody>
                            </table>
                            <div class="pagination-wrapper"> {!! $producto->appends(['search' => Request::get('search')])->render() !!} </div>
                        </div>
                        </div>

                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
