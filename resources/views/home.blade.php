@extends('adminlte::page')

@section('title', 'CotiFast')

@section('content_header')
    <h1>Escritorio</h1>
@stop

@section('content')
    {{ $fecha_hoy }}
    <!-- Main content -->
    <section class="content">
      <!-- Small boxes (Stat box) -->
      <div class="row">
        <div class="col-lg-3 col-xs-6">
          <!-- small box -->
          <div class="small-box bg-aqua">
            <div class="inner">
              <h3>{{ $count_proformashoy }}</h3>

              <p>Proformas de hoy</p>
            </div>
            <div class="icon">
              <i class="ion ion-bag"></i>
            </div>
            <a href="{{ url('admin/proforma') }}" class="small-box-footer">Ver <i class="fa fa-arrow-circle-right"></i></a>
          </div>
        </div>
        <!-- ./col -->
        <div class="col-lg-3 col-xs-6">
          <!-- small box -->
          <div class="small-box bg-green">
            <div class="inner">
              <h3>{{ $valor_proformas }}<sup style="font-size: 20px">$</sup></h3>

              <p>Proformas de hoy</p>
            </div>
            <div class="icon">
              <i class="ion ion-stats-bars"></i>
            </div>
            <a href="{{ url('admin/proforma') }}" class="small-box-footer">Ver <i class="fa fa-arrow-circle-right"></i></a>
          </div>
        </div>
        <!-- ./col -->
        <div class="col-lg-3 col-xs-6">
          <!-- small box -->
          <div class="small-box bg-yellow">
            <div class="inner">
              <h3>{{ $productos_total }}</h3>

              <p>Cantidad de productos</p>
            </div>
            <div class="icon">
              <i class="ion ion-folder"></i>
            </div>
            <a href="{{ url('admin/producto') }}" class="small-box-footer">Ver <i class="fa fa-arrow-circle-right"></i></a>
          </div>
        </div>
        <!-- ./col -->
        <div class="col-lg-3 col-xs-6">
          <!-- small box -->
          <div class="small-box bg-red">
            <div class="inner">
              <h3>{{ $productos_bajoonventario }}</h3>

              <p>Productos bajos de inventario.</p>
            </div>
            <div class="icon">
              <i class="ion ion-pie-graph"></i>
            </div>
            <a href="{{ url('admin/producto') }}" class="small-box-footer">Ver <i class="fa fa-arrow-circle-right"></i></a>
          </div>
        </div>
        <!-- ./col -->
      </div>
      <!-- /.row -->
      <!-- Main row -->
      <div class="row">
        <!-- Left col -->
        <section class="col-lg-7 connectedSortable">
          <!-- Custom tabs (Charts with tabs)-->
          <div class="box">
            <div class="box-header with-border">
              <h3 class="box-title">Productos en riesgo limite</h3>
            </div>
            <!-- /.box-header -->
            <div class="box-body">
              <table class="table table-bordered">
                <tr>
                  <th style="width: 10px">#</th>
                  <th>COD</th>
                  <th>Producto</th>
                  <th style="width: 40px">Stock</th>
                </tr>
                <?Php $i=1; ?>
                @foreach($productos as $product)
                <tr>
                  <td><?php echo $i; ?></td>
                  <td>{{ $product->cod_barra }}</td>
                  <td>{{ $product->producto }}</td>
                  <td><span class="badge bg-red">{{ $product->cantidad }}</span></td>
                </tr>
                <?Php $i++; ?>
                @endforeach                
              </table>
            </div>
            <!-- /.box-body -->

            <div class="box-footer clearfix">
              {!! $productos->appends(['search' => Request::get('search')])->render() !!} 
            </div>
          </div>
          <!-- /.box -->

          <!-- Chat box -->
          <div class="box box-success">
            <!-- Custom tabs (Charts with tabs)-->
          <div class="box">
            <div class="box-header with-border">
              <h3 class="box-title">Proformas de hoy</h3>
            </div>
            <!-- /.box-header -->
            <div class="box-body">
              <table class="table table-bordered">
                <tr>
                  <th style="width: 10px">#</th>
                  <th># Proforma</th>
                  <th>Ciente</th>
                  <th>Contactos</th>
                  <th style="width: 40px">Sub-Total</th>
                  <th style="width: 40px">Iva</th>
                  <th style="width: 40px">Total</th>
                </tr>
                <?Php $j=1; ?>
                @foreach($proformas as $pro)
                <tr>
                  <td><?php echo $j; ?></td>
                  <td>{{ $pro->secuencial_proforma }}</td>
                  <td>{{ $pro->cliente }}</td>
                  <td>{{ $pro->contactos }}</td>
                  <td>{{ $pro->subtotal }}</td>
                  <td>{{ $pro->iva_calculado }}</td>
                  <td>{{ $pro->total }}</td>
                </tr>
                <?Php $j++; ?>
                @endforeach                
              </table>
            </div>
            <!-- /.box-body -->

            <div class="box-footer clearfix">
              {!! $proformas->appends(['search' => Request::get('search')])->render() !!} 
            </div>
          </div>
          <!-- /.box -->
          </div>
          <!-- /.box (chat box) -->

          

        </section>
        <!-- /.Left col -->
        <!-- right col (We are only adding the ID to make the widgets sortable)-->
        <section class="col-lg-5 connectedSortable">
          <!-- /.info-box -->
          <div class="info-box bg-aqua">
            <span class="info-box-icon"><i class="ion-ios-chatbubble-outline"></i></span>

            <div class="info-box-content">
              <span class="info-box-text">Clientes</span>
              <span class="info-box-number">{{ $clientes }}</span>

              <div class="progress">
                <div class="progress-bar" style="width: 40%"></div>
              </div>
              <span class="progress-description">
                    Registrados en el sistema
                  </span>
            </div>
            <!-- /.info-box-content -->
          </div>
          <!-- /.info-box -->

        </section>
        <!-- right col -->
      </div>
      <!-- /.row (main row) -->

    </section>
    <!-- /.content -->
@stop