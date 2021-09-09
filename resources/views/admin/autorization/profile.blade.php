@extends('admin.master.master')

@section('content')

<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1>Perfil do Cliente</h1>
          </div>
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="{{ route('clients.index')}}">Clientes</a></li>
              <li class="breadcrumb-item active">Perfil</li>
            </ol>
          </div>
        </div>
      </div><!-- /.container-fluid -->
    </section>

    <section class="content">
      <div class="container-fluid">
        <div class="row">
          <div class="col-12">        
              <!-- Main content -->
              <div class="invoice p-3 mb-3">
                <!-- title row -->
                <div class="row">
                  <div class="col-12">
                    <h4>
                      <i class="fas fa-globe"></i>  Nome da Empresa Matriz
                      <small class="float-right">Data da AF: {{date('d/m/Y', strtotime($autorization->created_at))}}</small>
                    </h4>
                  </div>
                  <!-- /.col -->
                </div>
                <!-- info row -->
                <div class="row invoice-info">
                  <div class="col-sm-4 invoice-col">
                    Centro de Custo
                    <address>
                      <strong>{{ $autorization->client()->first()->social_name }}</strong><br>
                      {{ $autorization->client()->first()->street }}, {{ $autorization->client()->first()->neighboorhood }}<br>
                      {{ $autorization->client()->first()->city }}, {{ $autorization->client()->first()->state }}<br>
                      CEP: {{ $autorization->client()->first()->zipcode }} <br>
                      Telefone: {{ $autorization->client()->first()->telephone }}<br>
                      Email: {{ $autorization->client()->first()->email }}
                    </address>
                  </div>
                  <!-- /.col -->
                  <div class="col-sm-4 invoice-col">
                    Responsavel
                    <address>
                      <strong>Responsavel</strong><br>        
                    </address>
                  </div>       
                  <!-- /.col -->
                  <div class="col-sm-4 invoice-col">
                    <h4 class="float-right">AF - {{$autorization->id}}</h4><br><br>
                      @if ($autorization->status == null)
                        <a href="{{ route('autorization.autorize', ['autorize'=> $autorization->id]) }}" class="btn btn-sm btn-primary btn-block"><i class="fas fa-plus"></i> Autorizar AF</a><br>
                      @endif
                    <br>
                    
                  </div>
                </div>
                <!-- /.row -->
                <!-- /.row -->
              
              <!-- /.invoice -->
              
            </div>
           </div><!-- /.col -->
         </div><!-- /.row -->      
      </div><!-- /.container-fluid -->
    </section>
    
</div>

@endsection