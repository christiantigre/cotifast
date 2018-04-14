<style>
  .example-modal .modal {
    position: relative;
    top: auto;
    bottom: auto;
    right: auto;
    left: auto;
    display: block;
    z-index: 1;
  }
  .example-modal .modal {
    background: transparent !important;
  }
</style>
<link rel="stylesheet" type="text/css" href="//cdn.datatables.net/1.10.16/css/jquery.dataTables.min.css"/>
 

<div class="modal fade" id="modal-seleccionacliente">
  <div class="modal-dialog modal-lg">
    <div class="modal-content">
      {!! Form::open(['id'=>'myForm'])  !!}
      {{ csrf_field() }}
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span></button>

          <h4 class="modal-title">Seleccione Cliente</h4>           

        </div>
        <div class="modal-body">


          <!-- /.box-header -->
            <div class="box-body no-padding">
              <div id="list-clientes">

              </div>  
            </div>
            <!-- /.box-body -->
          <!-- /.box -->

         <div class="table-responsive">
            <table id="example1" class="table table-striped table-bordered" cellspacing="0" width="100%">
            <thead>
              <tr>
                <th>Actions</th>
                <th>ID</th>
                <th>Nombre</th>
                <th>DNI</th>
                <th>Dirección</th>
                <th>Contactos</th>
                <th>mail</th>
                <th>Estado</th>
              </tr>
            </thead>
            <tbody>
              @foreach($clientes as $item)
              <tr>
                <td>
                <button type='button' id="{{ $item->id }}" value="{{ $item->id }}" class="btn btn-info btn-xs select_cli_person" data-dismiss='modal'> Seleccionar</button>                  
                </td>
                <td>{{ $item->id }}</td>
                <td>{{ $item->nombre }} {{ $item->apellido }}</td>
                <td>{{ $item->cedula }} {{ $item->ruc }}</td>
                <td>{{ $item->direccion }}</td>
                <td>{{ $item->telefono }} / {{ $item->cel_movi }}/{{ $item->cel_claro }}</td>
                <td>{{ $item->email }}</td>
                <td>
                  @if( ($item->activo)=="0" )
                  Inactivo
                  @else
                  Activo
                  @endif
                </td>
              </tr>
              @endforeach
            </tbody>
          </table>
        </div>
          
          
        </div>
        <div class="modal-footer">
         <button type="button" class="btn btn-default pull-left" data-dismiss="modal">CERRAR</button>
         <!--{!! Form::submit(isset($submitButtonText) ? $submitButtonText : 'Create', ['class' => 'btn btn-primary']) !!}-->
       </div>
       {!! Form::close() !!}
     </div>
     <!-- /.modal-content -->
   </div>
   <!-- /.modal-dialog -->
 </div>
 <!-- /.modal -->
<script type="text/javascript" src="//cdn.datatables.net/1.10.16/js/jquery.dataTables.min.js"></script>

<script type="text/javascript">
  $(document).ready(function(){
      $('#example1').DataTable();
    });
/*  $(document).ready(function(){
        items_clientes_person();
    });
  function items_clientes_person(){
    console.log('loading clientes');
    var route = "{{ url('person/listclientes') }}";
    $.ajax({
        type:'get',
        url:route,
        success: function(data){
            $('#list-clientes').empty().html(data);
        }
    });
}
*/
</script>