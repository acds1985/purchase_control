@extends('admin.master.master')

@section('content')

<div class="content-wrapper">
  <!-- Content Header (Page header) -->
  <div class="content-header">
    <div class="container-fluid">
      <div class="row mb-2">
        <div class="col-sm-6">
          <h1 class="m-0">Clientes / Centro de Custo</h1>
        </div><!-- /.col -->
        <div class="col-sm-6">
          <ol class="breadcrumb float-sm-right">
            <li class="breadcrumb-item"><a href="{{route('clients.index')}}">Clientes</a></li>
            <li class="breadcrumb-item active">Lista</li>
          </ol>
        </div><!-- /.col -->
      </div><!-- /.row -->
    </div><!-- /.container-fluid -->
  </div>
  <!-- /.content-header -->

<div class="content">
  <!-- /.container-fluid -->
  <div class="card">
    <div class="card-header">
      <a href="{{route('clients.create')}}" class="btn btn-primary text-rigth"><i class="fas fa-plus"></i> Adicionar</a>
    </div>
    <!-- /.card-header -->
    <div class="card-body">
      <table id="example1" class="table table-bordered table-striped">
        <thead>
        <tr class="text-center">        
          <th>Razão Social</th>
          <th>Nome Fantasia</th>
          <th>CPF/CNPJ</th>
          <th>Contato</th>
          <th class="text-center" style="width: 200px">Ações</th>
        </tr>
        </thead>
        <tbody>
          @foreach ($clients as $client)
          <tr>           
              <td class="text-primary"><b>{{$client->social_name}}</b></td>
              <td>{{$client->alias_name}}</td>
              <td>{{$client->document_company}}</td>
              <td>{{$client->contact}}</td>     
              <td style="width: auto" class="text-center">
                <a href="{{route('clients.show', ['client'=> $client->id])}}" class="btn btn-sm btn-secondary" title="Visualizar Cliente"><i class="fas fa-eye"></i></a>
                <a href="{{route('clients.edit', ['client'=> $client->id])}}" class="btn btn-sm btn-primary" title="Editar Cliente"><i class="fas fa-edit"></i></a>
                <a href="" class="btn btn-sm btn-danger" title="Inativar Cliente"><i class="fas fa-trash-alt" ></i></a>
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