@extends('admin.master.master')

@section('content')

<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <div class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1 class="m-0">Cadastrar Usuario</h1>
          </div><!-- /.col -->
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="{{route('users.index')}}">Usuarios</a></li>
              <li class="breadcrumb-item active">Cadastrar</li>
            </ol>
          </div><!-- /.col -->
        </div><!-- /.row -->
      </div><!-- /.container-fluid -->
    </div>
    <!-- /.content-header -->
    <div class="content">
        <div class="container-fluid">
            <div class="row">
              <!-- left column -->
              <div class="col-md-12">
                @if($errors->all())
                  @foreach ($errors->all() as $error)
                    <div class="alert alert-danger"><i class="fas fa-asteristc"></i>{{$error}}</div>                 
                  @endforeach
                @endif
                <!-- general form elements -->
                <div class="card card-primary">
                  <div class="card-header">
                    <h3 class="card-title">Formulario de Cadastro</h3>
                  </div>
                  <!-- /.card-header -->
                  <!-- form start -->
                  <form method="post" action="{{route('users.store')}}">
                      @csrf
                    <div class="card-body">
                      <div class="form-group">
                        <label for="name">Nome</label>
                        <input type="text" class="form-control" id="name" name="name" placeholder="Informe o nome do usuario"
                        value="{{old('name')}}">
                      </div>
                      <div class="form-group">
                        <label for="email">E-mail</label>
                        <input type="email" class="form-control" id="email" name="email" placeholder="Informe o e-mail"
                        value="{{old('email')}}">
                      </div>
                      <div class="form-group">
                        <label for="password">Senha</label>
                        <input type="password" class="form-control" id="password" name="password" placeholder="Informe a Senha">
                      </div>
                      <div class="form-group">
                        <label>Nivel de Acesso</label>
                        <select class="form-control" name="level">
                            <option value="" disabled>Escolha o nivel de acesso</option>
                            <option value="2" {{old('level') == 2 ? 'selected' : ''}}>Administrador</option>
                            <option value="1" {{old('level') == 1 ? 'selected' : ''}}>Operador</option>
                        </select>
                      </div>
                      
                      <div class="form-check">
                        <input type="checkbox" class="form-check-input" id="check_status" name="status"
                        {{ (old('status') == 'on' || old('status') == true ? 'checked' : '') }}>
                        <label class="form-check-label" for="check_status">Ativo</label>
                      </div>
                    </div>
                    <!-- /.card-body -->
    
                    <div class="card-footer">
                      <button type="submit" class="btn btn-primary"><i class="fas fa-save"></i> Cadastrar</button>
                    </div>
                  </form>
                </div>
              </div>
            </div>
        </div>
    </div>
</div>
@endsection