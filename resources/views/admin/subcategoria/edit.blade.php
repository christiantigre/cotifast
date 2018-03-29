@extends('adminlte::page')

@section('content')
@include('errors.messages')
    <div class="container">
        <div class="row">

            <div class="col-md-11">
                <div class="panel panel-default">
                    <div class="panel-heading">Editar Subcategorium #{{ $subcategorium->id }}</div>
                    <div class="card-body">
                        <a href="{{ url('/admin/subcategoria') }}" title="Atras"><button class="btn btn-warning btn-sm"><i class="fa fa-arrow-left" aria-hidden="true"></i> Atras</button></a>
                        <br />
                        <br />

                        @if ($errors->any())
                            <ul class="alert alert-danger">
                                @foreach ($errors->all() as $error)
                                    <li>{{ $error }}</li>
                                @endforeach
                            </ul>
                        @endif

                            {!! Form::model($subcategorium, [
                            'method' => 'PATCH',
                            'url' => ['/admin/subcategoria', $subcategorium->id],
                            'class' => 'form-horizontal', 
                            'enctype'=>'multipart/form-data',
                            'files' => true,
                            'accept-charset'=>'UTF-8'
                        ]) !!}
                            {{ csrf_field() }}

                            @include ('admin.subcategoria.form', ['submitButtonText' => 'Actualizar'])

                        </form>

                    </div>
                </div>
            </div>
        </div>
@endsection
