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
                      <i class="fas fa-globe"></i>  {{$client->social_name}}
                      <small class="float-right">Cadastrada em: {{date('d/m/Y', strtotime($client->created_at))}}</small>
                    </h4>
                  </div>
                  <!-- /.col -->
                </div>
                <!-- info row -->
                <div class="row invoice-info">
                  <div class="col-sm-4 invoice-col">
                    Dados do Cliente
                    <address>
                      <strong>{{$client->alias_name}}</strong><br>
                      {{$client->street}}, {{$client->neighborhood}}<br>
                      {{$client->city}}, {{$client->state}}<br>
                      CEP: {{$client->zipcode}} <br>
                      Telefone: {{$client->telephone}}<br>
                      Email: {{$client->email}}
                    </address>
                  </div>
                  <!-- /.col -->
                  <div class="col-sm-4 invoice-col">
                    Responsavel
                    <address>
                      <strong>{{$client->contact}}</strong><br>        
                    </address>
                  </div>       
                  <!-- /.col -->
                  <div class="col-sm-4 invoice-col">
                    <a href="{{route('autorization.create')}}" class="btn btn-sm btn-primary btn-block"><i class="fas fa-plus"></i> Adicionar AF</a><br>
                    <br>
                    
                  </div>
                </div>
                <!-- /.row -->
                <!-- /.row -->
              
              <!-- /.invoice -->
              <table id="example1" class="table table-bordered table-striped">
                <thead>
                <tr class="text-center">        
                  <th>AF ID</th>
                  <th>Cliente/Centro Custo</th>
                  <th>Valor (R$)</th>
                  <th>Fornecedor</th>
                  <th>Status</th>
                  <th class="text-center" style="width: 200px">Ações</th>
                </tr>
                </thead>
                <tbody>
                  @foreach ($autorizations as $autorization)
                  <tr>           
                      <td class="text-primary"><b>{{$autorization->id}}</b></td>
                      <td>{{$autorization->client()->first()->social_name}}</td>
                      <td>{{$autorization->price}}</td>
                      <td>{{$autorization->provider()->first()->social_name}}</td>     
                      <td>{{($autorization->status == 0 ? 'Aguardando' : 'Autorizada')}}</td>     
                      <td style="width: auto" class="text-center">
                        <a href="{{route('autorization.edit', ['client'=> $autorization->id])}}" class="btn btn-sm btn-primary" title="Editar AF"><i class="fas fa-edit"></i></a>
                        <a href="" class="btn btn-sm btn-danger" title="Cancelar AF"><i class="fas fa-trash-alt" ></i></a>
                      </td>
                    </tr>    
                  @endforeach  
                </tbody>
                
              </table>
            </div>
           </div><!-- /.col -->
         </div><!-- /.row -->      
      </div><!-- /.container-fluid -->
    </section>
    
</div>

@endsection