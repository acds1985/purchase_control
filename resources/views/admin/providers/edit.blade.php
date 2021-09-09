@extends('admin.master.master')

@section('content')

<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <div class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1 class="m-0">Editar Cliente</h1>
          </div><!-- /.col -->
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="{{route('clients.index')}}">Cliente</a></li>
              <li class="breadcrumb-item active">Editar</li>
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
                    <h3 class="card-title">Formulario de Edicao</h3>
                  </div>
                  <!-- /.card-header -->
                  <!-- form start -->
                  <form method="post" action="{{route('providers.update', ['client' => $provider->id])}}">
                      @csrf
                      @method('PUT')
                      <input type="hidden" name="id" value="{{ $provider->id}}">
                    <div class="card-body row">
                      <div class="form-group col-md-6">
                        <label for="name">Razao Social</label>
                        <input type="social_name" class="form-control" id="social_name" name="social_name" placeholder="Informe a razao social"
                        value="{{old('social_name') ?? $provider->social_name}}">
                      </div>
                      <div class="form-group col-md-6">
                        <label for="alias_name">Nome Fantasia</label>
                        <input type="text" class="form-control" id="alias_name" name="alias_name" placeholder="Informe nome fantasia"
                        value="{{old('alias_name') ?? $provider->alias_name}}">
                      </div>
                      <div class="form-group col-md-6">
                        <label for="document_company">CNPJ</label>
                        <input type="tel" class="form-control mask-cnpj" id="document_company" name="document_company" placeholder="Informe o CNPJ"
                        value="{{old('document_company') ?? $provider->document_company}}">
                      </div>
                      <div class="form-group col-md-6">
                        <label for="document_company_secondary">Inscrição Estadual</label>
                        <input type="text" class="form-control" id="document_company_secondary" name="document_company_secondary" placeholder="Informe a Incricao estadual"
                        value="{{old('document_company_secondary') ?? $provider->document_company_secondary}}">
                      </div>

                      <div class="form-group col-md-2">
                        <label for="zipcode">CEP</label>
                        <input type="text" class="form-control mask-zipcode zip_code_search" id="zipcode" name="zipcode" placeholder="Informe o CEP"
                        value="{{old('zipcode') ?? $provider->zipcode}}">
                      </div>
                      <div class="form-group col-md-6">
                        <label for="street">Rua / Logradouro</label>
                        <input type="text" class="form-control street" id="street" name="street" placeholder="Informe endereco"
                        value="{{old('street') ?? $provider->street}}">
                      </div>
                      <div class="form-group col-md-4">
                        <label for="number">Numero</label>
                        <input type="text" class="form-control" id="number" name="number" placeholder="Informe o numero"
                        value="{{old('number') ?? $provider->number}}">
                      </div>
                      <div class="form-group col-md-6">
                        <label for="complement">Complemento</label>
                        <input type="text" class="form-control" id="complement" name="complement" placeholder="Informe o complemento"
                        value="{{old('complement') ?? $provider->complement}}">
                      </div>
                      <div class="form-group col-md-6">
                        <label for="neighborhood">Bairro</label>
                        <input type="text" class="form-control neighborhood" id="neighborhood" name="neighborhood" placeholder="Informe o bairro"
                        value="{{old('neighborhood') ?? $provider->neighborhood}}">
                      </div>
                      <div class="form-group col-md-6">
                        <label for="state">Estado</label>
                        <input type="text" class="form-control state" id="state" name="state" placeholder="Informe o estado"
                        value="{{old('state') ?? $provider->state}}">
                      </div>
                      <div class="form-group col-md-6">
                        <label for="city">Cidade</label>
                        <input type="text" class="form-control city" id="city" name="city" placeholder="Informe a cidade"
                        value="{{old('city') ?? $provider->city}}">
                      </div>
                      <div class="form-group col-md-6">
                        <label for="telephone">Telefone</label>
                        <input type="text" class="form-control mask-cell" id="telephone" name="telephone" placeholder="Informe um telefone para contato"
                        value="{{old('telephone') ?? $provider->telephone}}">
                      </div>
                      <div class="form-group col-md-6">
                        <label for="email">E-mail</label>
                        <input type="email" class="form-control email" id="email" name="email" placeholder="E-mail para contato"
                        value="{{old('email') ?? $provider->email}}">
                      </div>
                      <div class="form-group col-md-6">
                        <label for="contact">Contato</label>
                        <input type="text" class="form-control contact" id="contact" name="contact" placeholder="Pessoa de Contato"
                        value="{{old('contact') ?? $provider->contact}}">
                      </div>
                      <div class="form-group col-md-12">
                        <h4>Dados Bancarios</h4>
                        <hr>
                      </div>
                      <div class="form-group col-md-8">
                        <label for="bank">Banco</label>
                        <input type="text" class="form-control bank" id="bank" name="bank" placeholder="Informe o Banco"
                        value="{{old('bank') ?? $provider->bank}}">
                      </div>
                      <div class="form-group col-md-4">
                        <label for="bank_code">Código do Banco</label>
                        <input type="text" class="form-control contabank_codect" id="bank_code" name="bank_code" placeholder="Código do banco"
                        value="{{old('bank_code') ?? $provider->bank_code}}">
                      </div>
                      <div class="form-group col-md-4">
                        <label for="agency">Agencia</label>
                        <input type="text" class="form-control agency" id="agency" name="agency" placeholder="Agencia bancaria"
                        value="{{old('agency') ?? $provider->agency}}">
                      </div>
                      <div class="form-group col-md-4">
                        <label for="account">Conta Bancaria</label>
                        <input type="text" class="form-control account" id="account" name="account" placeholder="Conta Bancaria"
                        value="{{old('account') ?? $provider->account}}">
                      </div>
                      <div class="form-group col-md-4">
                        <label for="document_account">Documento titular</label>
                        <input type="text" class="form-control document_account" id="document_account" name="document_account" placeholder="Documento do Titular"
                        value="{{old('document_account') ?? $provider->document_account}}">
                      </div>
                      <div class="form-group col-md-6">
                        <label for="pix_key">Chave Pix</label>
                        <input type="text" class="form-control pix_key" id="pix_key" name="pix_key" placeholder="Chavé Pix"
                        value="{{old('pix_key') ?? $provider->pix_key}}">
                      </div>
                      <div class="form-group col-md-6">
                        <label for="social_name_bank">Contato</label>
                        <input type="text" class="form-control social_name_bank" id="social_name_bank" name="social_name_bank" placeholder="Razão Social"
                        value="{{old('social_name_bank') ?? $provider->social_name_bank}}">
                      </div>     
                    </div>
                    <!-- /.card-body -->
                    <div class="card-footer">
                      <button type="submit" class="btn btn-primary"><i class="fas fa-save"></i> Atualizar</button>
                    </div>
                  </form>
                </div>
              </div>
            </div>
        </div>
    </div>
</div>
@endsection