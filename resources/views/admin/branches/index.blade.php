@extends('admin.master.master')

@section('content')

<div class="content-wrapper">
  <!-- Content Header (Page header) -->
  <div class="content-header">
    <div class="container-fluid">
      <div class="row mb-2">
        <div class="col-sm-6">
          <h1 class="m-0">Filiais</h1>
        </div><!-- /.col -->
        <div class="col-sm-6">
          <ol class="breadcrumb float-sm-right">
            <li class="breadcrumb-item"><a href="{{route('users.index')}}">Filiais</a></li>
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
      <a href="{{route('branches.create')}}" class="btn btn-primary text-rigth"><i class="fas fa-plus"></i> Adicionar</a>
    </div>
    <!-- /.card-header -->
    <div class="card-body">
      <table id="example1" class="table table-bordered table-striped">
        <thead>
        <tr class="text-center">        
          <th>Razão Social</th>
          <th>Nome Fantasia</th>
          <th>CNPJ</th>
          <th>IE</th>
          <th>Responsavél</th>
          <th class="text-center" style="width: 200px">Ações</th>
        </tr>
        </thead>
        <tbody>
          @foreach ($branches as $branch)
          <tr>           
              <td class="text-primary"><b>{{$branch->social_name}}</b></td>
              <td>{{$branch->alias_name}}</td>
              <td>{{$branch->document_company}}</td>
              <td>{{$branch->document_company_secondary}}</td>     
              <td><a href="{{route('users.edit', ['user'=> $branch->user()->first()->id])}}" >{{$branch->user()->first()->name}}</a></td>
              <td style="width: auto" class="text-center">
                <a href="{{route('branches.edit', ['branch'=> $branch->id])}}" title="Editar Filial" class="btn btn-sm btn-primary"><i class="fas fa-edit"></i></a>
                <a href="" class="btn btn-sm btn-danger" title="Excluir Filial"><i class="fas fa-trash-alt"></i></a>
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