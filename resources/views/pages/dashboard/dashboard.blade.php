@extends('index')
@section('content')

<div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">
    <h1 class="h2">Dashboard</h1>
</div>
<div class="row">
    <div class="col-sm-6 mb-3 mb-sm-0">
      <div class="card">
        <div class="card-body">
          <h5 class="card-title">Produtos Cadastrados</h5>
          <p class="card-text">Total de Produtos cadastrados</p>
          <a href="{{route('produto.index')}}" class="btn btn-primary">{{$totalDeProdutoCadastrado}} - Produtos</a>
        </div>
      </div>
    </div>
    <div class="col-sm-6">
      <div class="card">
        <div class="card-body">
          <h5 class="card-title">Clientes Cadastrados</h5>
          <p class="card-text">Total de Clientes cadastrados no sistema</p>
          <a href="{{route('cliente.index')}}" class="btn btn-primary">{{$totalDeClienteCadastrado}} - Clientes</a>
        </div>
      </div>
    </div>
  </div>
  <div class="row mt-5">
    <div class="col-sm-6 mb-3 mb-sm-0">
      <div class="card">
        <div class="card-body">
          <h5 class="card-title">Vendas Cadastradas</h5>
          <p class="card-text">Total de Vendas cadastradas no sistema</p>
          <a href="{{route('venda.index')}}" class="btn btn-primary">{{$totalDeVendaCadastrada}} - Vendas</a>
        </div>
      </div>
    </div>
    <div class="col-sm-6">
      <div class="card">
        <div class="card-body">
          <h5 class="card-title">Usuários Cadastrados</h5>
          <p class="card-text">Total de Usuários cadastrados no sistema</p>
          <a href="{{route('user.index')}}" class="btn btn-primary">{{$totalDeUserCadastrado}} - Usuários</a>
        </div>
      </div>
    </div>
  </div>
@endsection