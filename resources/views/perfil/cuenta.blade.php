@extends('adminlte::page')

@section('content')
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <h1>
        Perfil
      </h1>
      <ol class="breadcrumb">
        <li><a href="{{ url('/admin/home') }}"><i class="fa fa-dashboard"></i> Admin</a></li>
        <li class="active">Perfil usuario</li>
      </ol>
    </section>

    <!-- Main content -->
    <section class="content">
      <div class="row">
        <div class="col-md-3">

          <!-- Profile Image -->
          <div class="box box-primary">
            <div class="box-body box-profile">
              @if(empty($usuario->img))
              <img class="profile-user-img img-responsive img-circle" src="{{ asset('uploads/statics/avatar.jpg') }}" alt="User profile picture">
              @else
              <img class="profile-user-img img-responsive img-circle" src="{{ asset($usuario->img) }}" alt="User profile picture">
              @endif

              @if(empty($credenciales->name))
              <h3 class="profile-username text-center">No Name</h3>
              @else
              <h3 class="profile-username text-center">{{ $credenciales->name }}</h3>
              @endif

              
              @if(empty($usuario->tipo_usuario))
              <p class="text-muted text-center">Sin Definír</p>
              @else
              <p class="text-muted text-center">{{ $usuario->tipo_usuario }}</p>
              @endif


              <a href="{{ url('/admin/settings/' . $usuario->id . '/edit') }}" title="Edit Card"><button class="btn btn-primary btn-block"><i class="fa fa-pencil-square-o" aria-hidden="true"></i> Editar</button></a>
              <br/>
              <a href="{{ url('/admin/settingscred/' . $credenciales->id . '/edit_cred') }}" title="Edit Card"><button class="btn btn-primary btn-block"><i class="fa fa-lock" aria-hidden="true"></i> Editar Credenciales</button></a>
            </div>
            <!-- /.box-body -->
          </div>
          <!-- /.box -->

          <!-- About Me Box -->
          <div class="box box-primary">
            <div class="box-header with-border">
              <h3 class="box-title">Sobre mi</h3>
            </div>
            <!-- /.box-header -->
            <div class="box-body">
              <strong><i class="fa fa-book margin-r-5"></i> Educación</strong>

              <p class="text-muted">
                @if(empty($usuario->educacion))
                  No especificar
                @else
                  {{ $usuario->educacion }}
                @endif
              </p>

              <hr>

              <strong><i class="fa fa-map-marker margin-r-5"></i> Ubicación</strong>

              <p class="text-muted">
                @if(empty($usuario->pais))
                  No definido
                @else
                  {{ $usuario->pais }}
                @endif
              , 
              @if(empty($usuario->ciudad))
                  No definido
                @else
                  {{ $usuario->ciudad }}
                @endif
            </p>

              <hr>

              
              <strong><i class="fa fa-file-text-o margin-r-5"></i> Frase</strong>

              <p>
                @if(empty($usuario->frase))
                  Sin frase
                @else
                  {{ $usuario->frase }}
                @endif
            </p>
            </div>
            <!-- /.box-body -->
          </div>
          <!-- /.box -->
        </div>
        <!-- /.col -->
        <div class="col-md-9">
          <div class="nav-tabs-custom">
            <ul class="nav nav-tabs">
              <li class="active"><a href="#cuenta" data-toggle="tab">Cuenta</a></li>
              <li><a href="#noticias" data-toggle="tab">Noticias</a></li>
              <li><a href="#notas" data-toggle="tab">Notas</a></li>
              <li><a href="#servicios" data-toggle="tab">Servicios</a></li>
              <li><a href="#productos" data-toggle="tab">Productos</a></li>
              <li><a href="#cursos" data-toggle="tab">Cursos</a></li>
            </ul>
            <div class="tab-content">
              <!--Cuenta-->
              <div class="active tab-pane" id="cuenta">
                <!-- Post -->
                <div class="post">
                  <div class="user-block">
                    @if(empty($usuario->img))
              <img class="profile-user-img img-responsive img-circle" src="{{ asset('uploads/statics/avatar.jpg') }}" alt="User profile picture">
              @else

                    <img class="img-circle img-bordered-sm" src="{{ asset($usuario->img) }}" alt="user image">
              @endif
                        <span class="username">
                          <a href="#">
                            @if(empty($usuario->nombres))
              No Name
              @else
              {{ $usuario->nombres }}
              @endif
              @if(empty($usuario->apellidos))
              No App
              @else
              {{ $usuario->apellidos }}
              @endif
                          .</a>
                          <a href="#" class="pull-right btn-box-tool"><i class="fa fa-times"></i></a>
                        </span>
                    <span class="description">Creado - {{$usuario->created_at}}</span>
                  </div>
                  <ul class="list-group list-group-unbordered">
                <li class="list-group-item">
                  <b>Fecha nacimiento</b> <a class="pull-right">
                     @if(empty($usuario->fecha_nacimiento))
                     -
                    @else
                    {{ $usuario->fecha_nacimiento }}
                    @endif
                  </a>
                </li>
                <li class="list-group-item">
                  <b>Telefono</b> <a class="pull-right">
                    @if(empty($usuario->telefono))
                     -
                    @else
                    {{ $usuario->telefono }}
                    @endif
                  </a>
                </li>
                <li class="list-group-item">
                  <b>Celular Movistar</b> <a class="pull-right">
                    @if(empty($usuario->cel_movi))
                     -
                    @else
                    {{ $usuario->cel_movi }}
                    @endif
                  </a>
                </li>
                <li class="list-group-item">
                  <b>Celular Claro</b> <a class="pull-right">
                    @if(empty($usuario->cel_claro))
                     -
                    @else
                    {{ $usuario->cel_claro }}
                    @endif
                  </a>
                </li>
                <li class="list-group-item">
                  <b>Whatsapp</b> <a class="pull-right">
                    @if(empty($usuario->wts))
                     -
                    @else
                    {{ $usuario->wts }}
                    @endif
                  </a>
                </li>
                <li class="list-group-item">
                  <b>Correo</b> <a class="pull-right">
                    @if(empty($usuario->email))
                     -
                    @else
                    {{ $usuario->email }}
                    @endif
                  </a>
                </li>
                <li class="list-group-item">
                  <b>Título</b> <a class="pull-right">
                    @if(empty($usuario->abrev))
                     -
                    @else
                    {{ $usuario->abrev }}
                    @endif
                  </a>
                </li>
                <li class="list-group-item">
                  <b>Pais</b> <a class="pull-right">
                    @if(empty($usuario->pais))
                     -
                    @else
                    {{ $usuario->pais }}
                    @endif
                  </a>
                </li>                
                <li class="list-group-item">
                  <b>Ciudad</b> <a class="pull-right">
                    @if(empty($usuario->ciudad))
                     -
                    @else
                    {{ $usuario->ciudad }}
                    @endif
                  </a>
                </li>              
                <li class="list-group-item">
                  <b>Estado</b> <a class="pull-right">
                    @if(($usuario->activo)=='1')
                      <span class="label label-success">Activado</span>
                    @else          
                    <span class="label label-warning">Desactivado</span>
                    @endif
                  </a>
                </li>
              </ul>

                  

                </div>
                <!-- /.post -->
              </div>
              <!--Fin cuenta-->

              
              


            </div>
            <!-- /.tab-content -->
          </div>
          <!-- /.nav-tabs-custom -->
        </div>
        <!-- /.col -->
      </div>
      <!-- /.row -->
    </section>
    <!-- /.content -->

@endsection