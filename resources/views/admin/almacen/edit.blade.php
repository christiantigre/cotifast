@extends('adminlte::page')

@section('content')
@include('errors.messages')
    <div class="container">
        <div class="row">

            <div class="col-md-11">
                <div class="panel panel-default">
                    <div class="panel-heading">Editar Almacen #{{ $almacen->almacen }}</div>
                    <div class="panel-body">
                        <a href="{{ url('/admin/almacen') }}" title="Atras"><button class="btn btn-warning btn-xs"><i class="fa fa-arrow-left" aria-hidden="true"></i> Atras</button></a>
                        <br />
                        <br />

                        @if ($errors->any())
                            <ul class="alert alert-danger">
                                @foreach ($errors->all() as $error)
                                    <li>{{ $error }}</li>
                                @endforeach
                            </ul>
                        @endif


                            {!! Form::model($almacen, [
                            'method' => 'PATCH',
                            'url' => ['/admin/almacen', $almacen->id],
                            'class' => 'form-horizontal', 
                            'enctype'=>'multipart/form-data',
                            'files' => true,
                            'accept-charset'=>'UTF-8'
                        ]) !!}

                            {{ csrf_field() }}

                            @include ('admin.almacen.form', ['submitButtonText' => 'Actualizar'])

                        </form>

                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection