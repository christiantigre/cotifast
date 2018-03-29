@extends('adminlte::page')
@section('content')
@include('errors.messages')
        <div class="row">
            <div class="col-md-12 col-lg-12 col-xs-12 col-sm-12">
                <div class="panel panel-default">
                    <div class="panel-heading">Subcategoría {{ $subcategorium->id }}</div>
                    <div class="panel-body">

                        <a href="{{ url('/admin/subcategoria') }}" title="Atras"><button class="btn btn-warning btn-sm"><i class="fa fa-arrow-left" aria-hidden="true"></i> Atras</button></a>
                        <a href="{{ url('/admin/subcategoria/' . $subcategorium->id . '/edit') }}" title="Editar Subcategorium"><button class="btn btn-primary btn-sm"><i class="fa fa-pencil-square-o" aria-hidden="true"></i> Editar</button></a>

                        <form method="POST" action="{{ url('admin/subcategoria' . '/' . $subcategorium->id) }}" accept-charset="UTF-8" style="display:inline">
                            {{ method_field('DELETE') }}
                            {{ csrf_field() }}
                            <button type="submit" class="btn btn-danger btn-sm" title="Eliminar Subcategorium" onclick="return confirm(&quot;Confirm delete?&quot;)"><i class="fa fa-trash-o" aria-hidden="true"></i> Eliminar</button>
                        </form>
                        <br/>
                        <br/>
                        <div class="col-md-12 col-lg-12 col-sm-12 col-xs-12">
                        <div class="table-responsive">
                            <table class="table">
                                <tbody>
                                    <tr>
                                        <th>ID</th><td>{{ $subcategorium->id }}</td>
                                    </tr>
                                    <tr><th> Subcategoria </th><td> {{ $subcategorium->Subcategoria }} </td></tr><tr><th> Detalle </th><td> {{ $subcategorium->detalle }} </td></tr><tr><th> Activo </th><td> {{ $subcategorium->activo }} </td></tr>
                                </tbody>
                            </table>
                        </div>
                        </div>

                    </div>
                </div>
            </div>
        </div>
@endsection
