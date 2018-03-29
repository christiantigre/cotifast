@extends('adminlte::page')
@section('content')
@include('errors.messages')
        <div class="row">
            <div class="col-md-12 col-lg-12 col-xs-12 col-sm-12">
                <div class="panel panel-default">
                    <div class="panel-heading">Categoría {{ $categorium->categoria }}</div>
                    <div class="panel-body">

                        <a href="{{ url('/admin/categoria') }}" title="Atras"><button class="btn btn-warning btn-sm"><i class="fa fa-arrow-left" aria-hidden="true"></i> Atras</button></a>
                        <a href="{{ url('/admin/categoria/' . $categorium->id . '/edit') }}" title="Editar Categoría"><button class="btn btn-primary btn-sm"><i class="fa fa-pencil-square-o" aria-hidden="true"></i> Editar</button></a>

                        <form method="POST" action="{{ url('admin/categoria' . '/' . $categorium->id) }}" accept-charset="UTF-8" style="display:inline">
                            {{ method_field('DELETE') }}
                            {{ csrf_field() }}
                            <button type="submit" class="btn btn-danger btn-sm" title="Eliminar Categoría" onclick="return confirm(&quot;Confirm delete?&quot;)"><i class="fa fa-trash-o" aria-hidden="true"></i> Eliminar</button>
                        </form>
                        <br/>
                        <br/>
                        <div class="col-md-12 col-lg-12 col-sm-12 col-xs-12">
                        <div class="table-responsive">
                            <table class="table">
                                <tbody>
                                    <tr>
                                        <th>ID</th><td>{{ $categorium->id }}</td>
                                    </tr>
                                    <tr><th> Categoría </th><td> {{ $categorium->categoria }} </td></tr><tr><th> Detalle </th><td> {{ $categorium->detalle }} </td></tr><tr><th> Activo </th><td> 
                                    @if(($categorium->activo)=='1')
                                    <small class="label label-success">Activo</small>
                                    @else
                                    <small class="label label-danger">Inactivo</small>
                                    @endif
                                </td></tr>
                                </tbody>
                            </table>
                        </div>
                        </div>

                    </div>
                </div>
            </div>
        </div>
@endsection
