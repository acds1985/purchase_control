@extends('admin.master.master')

@section('content')

<div class="content-wrapper">
  <!-- Content Header (Page header) -->
  <div class="content-header">
    <div class="container-fluid">
      <div class="row mb-2">
        <div class="col-sm-6">
          <h1 class="m-0">Dashboard</h1>
        </div><!-- /.col -->
        <div class="col-sm-6">
          <ol class="breadcrumb float-sm-right">
            <li class="breadcrumb-item"><a href="#">Home</a></li>
            <li class="breadcrumb-item active">Dashboard</li>
          </ol>
        </div><!-- /.col -->
      </div><!-- /.row -->
    </div><!-- /.container-fluid -->
  </div>
  <!-- /.content-header -->
  <!-- Main content -->
  <section class="content">
    <div class="container-fluid">
      <!-- Info boxes -->
      <div class="row">
        <div class="col-12 col-sm-6 col-md-3">
          <div class="info-box">
            <span class="info-box-icon bg-info elevation-1"><i class="fas fa-file"></i></span>

            <div class="info-box-content">
              <span class="info-box-text">AFs do Mes</span>
              <span class="info-box-number">
                {{$total}}      
              </span>
            </div>
            <!-- /.info-box-content -->
          </div>
          <!-- /.info-box -->
        </div>
        <!-- /.col -->
        <div class="col-12 col-sm-6 col-md-3">
          <div class="info-box mb-3">
            <span class="info-box-icon bg-danger elevation-1"><i class="fas fa-dollar-sign"></i></span>

            <div class="info-box-content">
              <span class="info-box-text">Total Autorizado</span>
              <span class="info-box-number">R$ {{ number_format($total_autorizadas,2,",",".")}}</span>
            </div>
            <!-- /.info-box-content -->
          </div>
          <!-- /.info-box -->
        </div>
        <!-- /.col -->

        <!-- fix for small devices only -->
        <div class="clearfix hidden-md-up"></div>

        <div class="col-12 col-sm-6 col-md-3">
          <div class="info-box mb-3">
            <span class="info-box-icon bg-success elevation-1"><i class="fas fa-user"></i></span>

            <div class="info-box-content">
              <span class="info-box-text">Clientes/Obras</span>
              <span class="info-box-number">{{ $clients }}</span>
            </div>
            <!-- /.info-box-content -->
          </div>
          <!-- /.info-box -->
        </div>
        <!-- /.col -->
        <div class="col-12 col-sm-6 col-md-3">
          <div class="info-box mb-3">
            <span class="info-box-icon bg-warning elevation-1"><i class="fas fa-money-bill-wave"></i></span>

            <div class="info-box-content">
              <span class="info-box-text">Tiket Medio</span>
              <span class="info-box-number">R$ {{ number_format($ticket,2,",",".")  }}</span>
            </div>
            <!-- /.info-box-content -->
          </div>
          <!-- /.info-box -->
        </div>
        <!-- /.col -->
      </div>
      <!-- /.row -->

      <!-- Main row -->
      <div class="row">
        <!-- Left col -->
        <div class="col-md-12">
         
          <!-- TABLE: LATEST ORDERS -->
          <div class="card">
            <div class="card-header border-transparent">
              <h3 class="card-title">Ultimas AFs</h3>

              <div class="card-tools">
                <button type="button" class="btn btn-tool" data-card-widget="collapse">
                  <i class="fas fa-minus"></i>
                </button>
                <button type="button" class="btn btn-tool" data-card-widget="remove">
                  <i class="fas fa-times"></i>
                </button>
              </div>
            </div>
            <!-- /.card-header -->
            <div class="card-body p-0">
              <div class="table-responsive">
                <table class="table m-0">
                  <thead>
                 
                  <tr>
                    <th>AFs ID</th>
                    <th>Cliente</th>
                    <th>Valor R$</th>
                    <th>Status</th>
                    <th>Autorizado por:</th>
                    <th>Autorizado em:</th>
                  </tr>
                  </thead>
                  <tbody>
                    @foreach ($autorizations as $autorization )
                    <tr>
                      <td><a href=""><b>AF{{$autorization->id}}</b></a></td>
                      <td>{{$autorization->client()->first()->social_name }}</td>
                      <td>
                        <div class="sparkbar" data-color="#00a65a" data-height="20">{{ number_format($autorization->price,2,",",".") }}</div>
                      </td>
                      <td>
                        @php
                          if($autorization->status == 0){
                            echo "<span class='badge badge-warning'>Aguardando</span>";
                          }elseif ($autorization->status == 1) {
                            echo "<span class='badge badge-success'>Autorizada</span>";
                          }else{
                            echo "<span class='badge badge-danger'>Cancelada</span>";
                          }
                        @endphp  
                      </td>
                      <td><span class="badge badge-success">{{ ($autorization->authorized_by ? $autorization->authorized_by : '') }}</span></td>
                      <td>{{ ($autorization->authorized_in ? date('d/m/Y', strtotime($autorization->authorized_in)) : '...')  }}</td>
                    </tr>
                    
                    @endforeach
                 
                  </tbody>
                </table>
              </div>
              <!-- /.table-responsive -->
            </div>
            <!-- /.card-body -->
            <div class="card-footer clearfix">
              <a href="{{ route('autorization.create') }}" class="btn btn-sm btn-info float-left"><i class="fas fa-file-alt"></i> Criar Nova AF</a>
              <a href="{{ route('autorization.index') }}" class="btn btn-sm btn-secondary float-right"><i class="fas fa-view"></i> Ver todas AFs</a>
            </div>
            <!-- /.card-footer -->
          </div>
          <!-- /.card -->
        </div>
        <!-- /.col -->
      </div>
      <!-- /.row -->
    </div><!--/. container-fluid -->
  </section>
  <!-- /.content -->

</div>

@endsection