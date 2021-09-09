@extends('admin.master.master')

@section('content')

<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <div class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1 class="m-0">Autorizar AF</h1>
          </div><!-- /.col -->
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="{{route('autorization.index')}}">AF</a></li>
              <li class="breadcrumb-item active">Autorizar</li>
            </ol>
          </div><!-- /.col -->
        </div><!-- /.row -->
      </div><!-- /.container-fluid -->
      @if (session()->exists('message'))
      <div class="alert {{ session()->get('color') }}"><i class="fas fa-exclamation-circle"></i> {{session()->get('message')}}</div>
      @endif
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
                    <h3 class="card-title">Autorização da AF Nº - {{$id}}</h3>
                  </div>
                  <!-- /.card-header -->
                  <!-- form start -->
                  <form method="post" action="{{route('autorization.confirm')}}">
                    @csrf
                    <input type="hidden" name="id" value="{{ $id }}">
                    <div class="card-body row">                      
                      <div class="form-group col-md-6">
                          <label for="token">Informe o Token</label>
                          <input type="password" class="form-control" id="token" name="token" maxlength="4" placeholder="Informe o token" required>
                      </div>
                    </div>
                    <!-- /.card-body -->
                    <div class="card-footer">
                      <button type="submit" class="btn btn-primary"><i class="fas fa-check"></i> Autorizar</button>
                    </div>
                  </form>
                </div>
              </div>
            </div>
        </div>
    </div>
</div>
@endsection