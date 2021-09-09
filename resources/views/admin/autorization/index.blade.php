@extends('admin.master.master')

@section('content')

<div class="content-wrapper">
  <!-- Content Header (Page header) -->
  <div class="content-header">
    <div class="container-fluid">
      <div class="row mb-2">
        <div class="col-sm-6">
          <h1 class="m-0">AFs - Autorizações de Fornecimento</h1>
        </div><!-- /.col -->
        <div class="col-sm-6">
          <ol class="breadcrumb float-sm-right">
            <li class="breadcrumb-item"><a href="{{route('autorization.index')}}">AFs</a></li>
            <li class="breadcrumb-item active">Lista</li>
          </ol>
        </div><!-- /.col -->

      </div><!-- /.row -->
      
      
    </div><!-- /.container-fluid -->
    @if (session()->exists('message'))
      <div class="alert {{ session()->get('color') }}"><i class="fas fa-check"></i> {{session()->get('message')}}</div>
    @endif
  </div>
  <!-- /.content-header -->

<div class="content">
  <!-- /.container-fluid -->
  <div class="card">
    <div class="card-header">
      <a href="{{route('autorization.create')}}" class="btn btn-primary text-rigth"><i class="fas fa-plus"></i> Adicionar</a>
    </div>
    <!-- /.card-header -->
    <div class="card-body">
      <table id="example1" class="table table-bordered table-striped">
        <thead>
        <tr class="text-center">        
          <th>AF ID</th>
          <th>Cliente/Centro Custo</th>
          <th>Valor (R$)</th>
          <th>Fornecedor</th>
          <th>Filial</th>
          <th>Status</th>
          <th class="text-center" style="width: 200px">Ações</th>
        </tr>
        </thead>
        <tbody>
          @foreach ($autorizations as $autorization)
          <tr>           
              <td class="text-primary"><b>AF{{$autorization->id}}</b></td>
              <td>{{$autorization->client()->first()->social_name}}</td>
              <td>{{number_format($autorization->price,2,",",".")}}</td>
              <td>{{$autorization->provider()->first()->social_name}}</td>     
              <td>{{$autorization->branch()->first()->social_name}}</td>     
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
              <td style="width: auto" class="text-center">
                @if ($autorization->status == 1)
                  <a href="" class="btn btn-sm btn-warning" title="Gerar PDF"><i class="fas fa-file-pdf"></i></a>
                @else
                  <a href="{{route('autorization.edit', ['client'=> $autorization->id])}}" class="btn btn-sm btn-primary" title="Editar AF"><i class="fas fa-edit"></i></a>           
                @endif
                <a href="{{route('autorization.show', ['client'=> $autorization->id])}}" class="btn btn-sm btn-secondary" title="Visualizar AF"><i class="fas fa-eye"></i></a>
                <a href="{{route('autorization.inative', ['client'=> $autorization->id])}}" class="btn btn-sm btn-danger" title="Cancelar AF"><i class="fas fa-trash-alt" ></i></a>
              </td>
            </tr>    
          @endforeach  
        </tbody>
        
      </table>
    </div>
    <!-- /.card-body -->
  </div>
  <!-- /.card -->
</div>
</div>

@endsection