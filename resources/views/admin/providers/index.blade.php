@extends('admin.master.master')

@section('content')

<div class="content-wrapper">
  <!-- Content Header (Page header) -->
  <div class="content-header">
    <div class="container-fluid">
      <div class="row mb-2">
        <div class="col-sm-6">
          <h1 class="m-0">Fornecedores</h1>
        </div><!-- /.col -->
        <div class="col-sm-6">
          <ol class="breadcrumb float-sm-right">
            <li class="breadcrumb-item"><a href="{{route('clients.index')}}">Fornecedores</a></li>
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
      <a href="{{route('providers.create')}}" class="btn btn-primary text-rigth"><i class="fas fa-plus"></i> Adicionar</a>
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
          @foreach ($providers as $provider)
          <tr>           
              <td class="text-primary"><b>{{$provider->social_name}}</b></td>
              <td>{{$provider->alias_name}}</td>
              <td>{{$provider->document_company}}</td>
              <td>{{$provider->contact}}</td>     
              <td style="width: auto" class="text-center">
                <a href="{{route('providers.edit', ['client'=> $provider->id])}}" class="btn btn-sm btn-primary" title="Editar Fornecedor"><i class="fas fa-edit"></i></a>
                <a href="" class="btn btn-sm btn-danger" title="Inativar Fornecetor"><i class="fas fa-trash-alt" ></i></a>
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