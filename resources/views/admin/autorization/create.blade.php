@extends('admin.master.master')

@section('content')

<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <div class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1 class="m-0">Cadastrar AF</h1>
          </div><!-- /.col -->
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="{{route('branches.index')}}">AF</a></li>
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

                @if (session()->exists('message'))
                  <div class="alert {{ session()->get('color') }}"><i class="fas fa-check"></i> {{session()->get('message')}}</div>
                @endif
                <!-- general form elements -->
                <div class="card card-primary">
                  <div class="card-header">
                    <h3 class="card-title">Formulario de Cadastro</h3>
                  </div>
                  <!-- /.card-header -->
                  <!-- form start -->
                  <form method="post" action="{{route('autorization.store')}}">
                    @csrf
                    <div class="card-body row">
                        <div class="form-group col-md-4">
                            <label for="client">Centro de Custo</label>
                            <select class="form-control select2" name="client" id="client">
                              <option value="">Selecione o Centro de Custo</option>
                              @foreach ($clients as $client)
                              <option value="{{$client->id}}">{{ $client->alias_name }} ( {{$client->document_company}}) </option>                                
                              @endforeach
                        </select> 
                      </div> 
                            <div class="form-group col-md-4">
                                <label for="branch">Filial</label>
                                <select class="form-control select2" name="branch" id="branch">
                                <option value="">Selecione a filial</option>
                                @foreach ($branches as $branch)
                                <option value="{{$branch->id}}">{{ $branch->alias_name }} ( {{$branch->document_company}}) </option>     
                                @endforeach
                            </select> 
                        </div> 
                        <div class="form-group col-md-4">
                          <label for="provider">Fornecedor</label>
                          <select class="form-control select2" name="provider" id="provider">
                          <option value="">Selecione o Fornecedor</option>
                          @foreach ($providers as $provider)
                              <option value="{{$provider->id}}">{{ $provider->alias_name }} ( {{$provider->document_company}}) </option>                      
                              @endforeach
                          </select> 
                        </div>
                        
                        <div class="form-group col-md-4">
                          <label for="budget_number">Numero do Oçamento</label>
                          <input type="text" class="form-control" id="budget_number" name="budget_number" placeholder="Informe Numero do Orçamento"
                          value="{{old('budget_number')}}">
                        </div>
                        <div class="form-group col-md-4">
                          <label for="payment">Forma de Pagamento</label>
                          <select class="form-control" name="payment" id="payment">
                          <option value="">Selecione a Forma de Pagamento</option>
                              <option value="Dinheiro">Dinheiro</option>                      
                              <option value="Cheque">Cheque</option>                      
                              <option value="Cartão">Cartão de Crédito</option>                      
                              <option value="Tranferencia">Transferencia</option>                      
                              <option value="Pix">PIX</option>                      
                              <option value="Boleto">Boleto</option>                                            
                          </select> 
                        </div>
                        <div class="form-group col-md-4">
                          <label for="subject">Assunto</label>
                          <input type="text" class="form-control" id="subject" name="ubject" placeholder="Informe um assunto"
                          value="{{old('subject')}}">
                        </div>
                        <div class="form-group col-md-12">
                          <label for="note">Observações</label>
                          <input type="text" class="form-control" id="note" name="note" placeholder="Observações"
                          value="{{old('note')}}">
                        </div>   
                        <div class="form-gourp col-md-12">
                          <h3>Itens da AF</h3>
                          <hr>
                        </div>         
                        <div class="form-group col-md-8">
                            <label for="description">Descrição da AF</label>
                            <input type="text" class="form-control" id="description" name="description" placeholder="Informe a descrição da AF"
                            value="{{old('description')}}">
                        </div>                   
                        <div class="form-group col-md-4">
                            <label for="price">Valor (R$)</label>
                            <input type="text" class="form-control mask-money" id="price" name="price" placeholder="Informe o valor"
                            value="{{old('price')}}">
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