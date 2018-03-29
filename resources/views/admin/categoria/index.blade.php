@extends('adminlte::page')
@section('content')
@include('errors.messages')
        <div class="row">

            <div class="col-md-12 col-lg-12 col-sm-12 col-xs-12">
                <div class="panel panel-default">
                    <div class="panel-heading">Categoría</div>
                    <div class="panel-body">
                        <a href="{{ url('/admin/categoria/create') }}" class="btn btn-success btn-sm" title="Nueva Categoría">
                            <i class="fa fa-plus" aria-hidden="true"></i> Nueva
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
                                        <th>#</th><th>Categoría</th><th>Detalle</th><th>Activo</th><th>Actions</th>
                                    </tr>
                                </thead>
                                <tbody>
                                @foreach($categoria as $item)
                                    <tr>
                                        <td>{{ $loop->iteration or $item->id }}</td>
                                        <td>{{ $item->categoria }}</td><td>{{ $item->detalle }}</td><td>@if(($item->activo)=='1')
                                    <small class="label label-success">Activo</small>
                                    @else
                                    <small class="label label-danger">Inactivo</small>
                                    @endif</td>
                                        <td>
                                            <a href="{{ url('/admin/categoria/' . $item->id) }}" title="Ver Categoría"><button class="btn btn-info btn-sm"><i class="fa fa-eye" aria-hidden="true"></i> Ver</button></a>
                                            <a href="{{ url('/admin/categoria/' . $item->id . '/edit') }}" title="Editar Categoría"><button class="btn btn-primary btn-sm"><i class="fa fa-pencil-square-o" aria-hidden="true"></i> Editar</button></a>

                                            <form method="POST" action="{{ url('/admin/categoria' . '/' . $item->id) }}" accept-charset="UTF-8" style="display:inline">
                                                {{ method_field('DELETE') }}
                                                {{ csrf_field() }}
                                                <button type="submit" class="btn btn-danger btn-sm" title="Eliminar Categoría" onclick="return confirm(&quot;Confirm delete?&quot;)"><i class="fa fa-trash-o" aria-hidden="true"></i> Eliminar</button>
                                            </form>
                                        </td>
                                    </tr>
                                @endforeach
                                </tbody>
                            </table>
                            <div class="pagination-wrapper"> {!! $categoria->appends(['search' => Request::get('search')])->render() !!} </div>
                        </div>
                        </div>

                    </div>
                </div>
            </div>
        </div>
@endsection
