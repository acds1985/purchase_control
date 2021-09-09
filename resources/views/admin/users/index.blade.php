@extends('admin.master.master')

@section('content')

<div class="content-wrapper">
  <!-- Content Header (Page header) -->
  <div class="content-header">
    <div class="container-fluid">
      <div class="row mb-2">
        <div class="col-sm-6">
          <h1 class="m-0">Usuarios Cadastrados</h1>
        </div><!-- /.col -->
        <div class="col-sm-6">
          <ol class="breadcrumb float-sm-right">
            <li class="breadcrumb-item"><a href="{{route('users.index')}}">Usuarios</a></li>
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
      <a href="{{route('users.create')}}" class="btn btn-primary text-rigth"><i class="fas fa-plus"></i> Adicionar</a>
    </div>
    <!-- /.card-header -->
    <div class="card-body">
      <table id="example1" class="table table-bordered table-striped">
        <thead>
        <tr class="text-center">
          <th style="width: 50px">Id</th>
          <th>Nome</th>
          <th>E-mail</th>
          <th>Nivel</th>
          <th>Status</th>
          <th class="text-center" style="width: 150px">Acoes</th>
        </tr>
        </thead>
        <tbody>
          @foreach ($users as $user)       
            <tr>
              <td>{{$user->id}}</td>
              <td class="text-primary">{{$user->name}}</td>
              <td><a href="mailto:{{$user->email}}">{{$user->email}}</a></td>
              <td> {{ ($user->level == 2 ? 'Admin' : 'Operador')}} </td>     
              <td>{{ ($user->status == 1 ? 'Ativo' : 'inativo')}}</td>
              <td>
                <a href="{{route('users.edit', ['user'=> $user->id])}}" class="btn btn-sm btn-primary"><i class="fas fa-edit"></i> Editar</a>
                <a href="" class="btn btn-sm btn-danger"><i class="fas fa-trash-alt"></i> Excluir</a>
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