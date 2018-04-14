@extends('adminlte::page')
@section('content')
@include('errors.messages')
<div class="row">
    <section class="content-header">
      <h1>
        <small>Proformas</small>
    </h1>
    <ol class="breadcrumb">
        <li><a href="#"><i class="fa fa-dashboard"></i> Inicio</a></li>
        <li><a href="#">proformas</a></li>
        <li class="active">Registrar</li>
    </ol>
</section>
<section class="content">
 <div class="col-md-12 col-lg-12 col-xs-12 col-sm-12">
    <!-- SELECT2 EXAMPLE -->
    <div class="box box-default">
        <div class="panel-heading">
            <a href="{{ url('/admin/proforma') }}" title="Atras"><button class="btn btn-warning btn-xs"><i class="fa fa-arrow-left" aria-hidden="true"></i> Atras</button></a>
            <br />
            <br />
            @if ($errors->any())
            <ul class="alert alert-danger">
                @foreach ($errors->all() as $error)
                <li>{{ $error }}</li>
                @endforeach
            </ul>
            @endif
        </div>
        <!-- /.box-header -->
        <div class="box-body">
          <div class="row">
            <form method="POST" action="{{ url('/admin/proforma') }}" accept-charset="UTF-8" class="form-horizontal" enctype="multipart/form-data">
                {{ csrf_field() }}
                @include ('admin.proforma.form')
            </form>
        </div>
        <!-- /.row -->
    </div>
    <!-- /.box-body -->
    <div class="box-footer">
      No dudes en contactarte con el desarrollador de la aplicación, envíanos un mensaje con tu sugerencia o reporte de acciònes defectuosas del sistema.
  </div>
</div>
<!-- /.box -->
</section>
</div>
@include('admin.proforma.modalselec_cli')
@include('admin.proforma.modalselect_prod')
<script type="text/javascript">
    $(document).ready(function(){
        items_cart_person();
    });

    //llena de datos tabla productos en la modal listcartitems
    function items_cart_person(){
        console.log('loading items cart');
        var route = "{{ url('admin/listcartitems') }}";
        $.ajax({
            type:'get',
        //url:'/person/listcartitems/',
        url:route,
        success: function(data){
            $('#list-cart').empty().html(data);
        }
    });
    }

    function reset_input(){
        console.log('reseting');
        document.getElementById("cliente_id").value = "";
        document.getElementById("cliente").value = "";
        document.getElementById("documento_ruc").value = "";
        document.getElementById("documento_ced").value = "";
        document.getElementById("destinatario_mail").value = "";
        document.getElementById("contactos").value = "";
        document.getElementById("direccion_cliente").value = "";
    }
        //Selecciona cliente en el modal y envia datos a los campos midleware:person
        $('.select_cli_person').click(function(){
            reset_input();
            var dataId = this.id;
            var token = $("input[name=_token]").val();
    //var route = '/person/extraerdatoscli/';
    var route = '{{ url("admin/extraerdatoscli") }}';
    var parametros = {
        "id" :dataId
    }
    $.ajax({
        url:route,
        headers:{'X-CSRF-TOKEN':token},
        type:'get',
        dataType: 'json',
        data:parametros,
        success:function(data)
        {
            //data.cel_movi
            console.log(data.id);
            console.log("copy data selected");
            document.getElementById("cliente").value = data.nombre+' '+data.apellido;
            document.getElementById("documento_ruc").value = data.ruc;
            document.getElementById("documento_ced").value = data.cedula;
            document.getElementById("contactos").value = data.telefono+' '+data.cel_movi+' '+data.cel_claro;
            document.getElementById("direccion_cliente").value = data.direccion;
            document.getElementById("destinatario_mail").value = data.email;
            document.getElementById("cliente_id").value = data.id;
            console.log("copy data succefull");
        },
        error:function(data)
        {
            console.log('Error '+data);
        }  
    });
});

        function trashPerson(id){    
            var answer = confirm("Desea eliminar todos los items?");
            if (answer) {
                console.log(id);
                var token = $("input[name=_token]").val();
    //var route = '/admin/trashItem/';    
    var route = '{{ url("admin/trashItem") }}';    
    var parametros = {
        "id" :'0'
    }
    $.ajax({
        url:route,
        headers:{'X-CSRF-TOKEN':token},
        type:'post',
        dataType: 'json',
        data:parametros,
        success:function(data)
        {
            console.log('correcto '+data.data);
            items_cart_person();   
        },
        error:function(data)
        {
            console.log('Error '+data);
        }  
    });
}
}

function delete_item_person(id){
    var answer = confirm("Desea eliminar este item?");
    if (answer) {
        var token = $("input[name=_token]").val();
    //var route = '/admin/deleteItem/';   
    var route = '{{ url("admin/deleteItem") }}';   
    var parametros = {
        "id" :id
    }
    $.ajax({
        url:route,
        headers:{'X-CSRF-TOKEN':token},
        type:'post',
        dataType: 'json',
        data:parametros,
        success:function(data)
        {
            console.log('correcto '+data.data);
            items_cart_person();   
        },
        error:function(data)
        {
            console.log('Error '+data);
        }  
    });
}
}

</script>
@endsection
