@extends('adminlte::page')
@section('content')
@include('errors.messages')
        <div class="row">
            <div class="col-md-12 col-lg-12 col-xs-12 col-sm-12">
                <div class="panel panel-default">
                    <div class="panel-heading">Cliente {{ $cliente->id }}</div>
                    <div class="panel-body">

                        <a href="{{ url('/admin/cliente') }}" title="Atras"><button class="btn btn-warning btn-sm"><i class="fa fa-arrow-left" aria-hidden="true"></i> Atras</button></a>
                        <a href="{{ url('/admin/cliente/' . $cliente->id . '/edit') }}" title="Editar Cliente"><button class="btn btn-primary btn-sm"><i class="fa fa-pencil-square-o" aria-hidden="true"></i> Editar</button></a>

                        <form method="POST" action="{{ url('admin/cliente' . '/' . $cliente->id) }}" accept-charset="UTF-8" style="display:inline">
                            {{ method_field('DELETE') }}
                            {{ csrf_field() }}
                            <button type="submit" class="btn btn-danger btn-sm" title="Eliminar Cliente" onclick="return confirm(&quot;Confirm delete?&quot;)"><i class="fa fa-trash-o" aria-hidden="true"></i> Eliminar</button>
                        </form>
                        <br/>
                        <br/>

                        <div class="table-responsive">
                            <table class="table">
                                <tbody>
                                    <tr>
                                        <th>ID</th><td>{{ $cliente->id }}</td>
                                    </tr>
                                    <tr>
                                        <th> Nombre </th><td> {{ $cliente->nombre }} </td>
                                    </tr>
                                    <tr>
                                        <th> Apellido </th><td> {{ $cliente->apellido }} </td>
                                    </tr>
                                    <tr>
                                        <th> Cedula </th><td> {{ $cliente->cedula }} </td>
                                    </tr>
                                    <tr>
                                        <th> Ruc </th><td> {{ $cliente->ruc }} </td>
                                    </tr>
                                    <tr>
                                        <th> Email </th><td> {{ $cliente->email }} </td>
                                    </tr>

                                    <tr>
                                        <th> Telefono </th><td> {{ $cliente->telefono }} </td>
                                    </tr>

                                    <tr>
                                        <th> Movistar </th><td> {{ $cliente->cel_movi }} </td>
                                    </tr>

                                    <tr>
                                        <th> Claro </th><td> {{ $cliente->cel_claro }} </td>
                                    </tr>
                                    <tr>
                                        <th> Whatsapp </th><td> {{ $cliente->wts }} </td>
                                    </tr>

                                    <tr>
                                        <th> Dirección </th><td> {{ $cliente->direccion }} </td>
                                    </tr>

                                    <tr>
                                        <th> Feha nacimiento </th><td> {{ $cliente->fecha_nacimiento }} </td>
                                    </tr>

                                    <tr>
                                        <th> Estado civil </th><td> 
                                        @if(($cliente->estado_civil)=='1')
                                            Soltero/a
                                        @endif
                                        @if(($cliente->estado_civil)=='2')
                                            Casado/a
                                        @endif
                                        @if(($cliente->estado_civil)=='3')
                                            Divorciado/a
                                        @endif
                                        @if(($cliente->estado_civil)=='4')
                                            Viudo/a
                                        @endif
                                        @if(($cliente->estado_civil)=='5')
                                            Union de Hecho
                                        @endif
                                    </td>
                                    </tr>

                                    <tr>
                                        <th> Genero </th><td> 
                                            @if(($cliente->genero)=='1')
                                            Masculino
                                        @endif
                                        @if(($cliente->genero)=='0')
                                            Femenino
                                        @endif
                                        </td>
                                    </tr>

                                    <tr>
                                        <th> Pais </th><td> {{ $cliente->pais->pais }} </td>
                                    </tr>
                                    <tr>
                                        <th> Peovincia </th><td> {{ $cliente->provincia->provincia }} </td>
                                    </tr>
                                    <tr>
                                        <th> Cantón </th><td> {{ $cliente->canton->canton }} </td>
                                    </tr>

                                    <tr>
                                        <th> Estado </th><td> 
                                        @if(($cliente->activo)=='1')
                                            <small class="label pull-left bg-green">Activado</small>
                                        @else
                                            <small class="label pull-left bg-red">Desactivado</small>
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
