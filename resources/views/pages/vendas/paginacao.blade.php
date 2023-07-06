@extends('index')
@section('content')
<div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">
    <h1 class="h2">Vendas</h1>
</div>
<div>
    <form action="{{ route('venda.index') }}" method="GET" class="form-inline">
        <div class="form-group mx-sm-3 mb-2">
            <input type="text" class="form" name="pesquisar" id="pesquisar" placeholder="Digite o nome" value="{{ old('pesquisar')}}" />
            <button class="btn btn-secondary">Pesquisar</button>
            <a href="{{ route('cadastrar.venda') }}" type="button" class="btn btn-success float-end">Nova Venda</a>
        </div>
    </form>
    <div class="table-responsive small mt-4">
        @if ($findVenda->isEmpty())
            <p>Não existem dados</p>
        @else
            <table class="table table-striped table-sm">
                <thead>
                    <tr>
                        <th scope="col">Nº Venda</th>
                        <th scope="col">Produto</th>
                        <th scope="col">Valor</th>
                        <th scope="col">Cliente</th>
                        <th scope="col">Data</th>
                        <th scope="col">Ações</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($findVenda as $venda)
                        <tr>
                            <td>{{ $venda->numero_da_venda}}</td>                                
                            <td>{{ 'R$' . ' ' . number_format($venda->produto->valor, 2, ',', '.') }}</td>
                            <td>{{ $venda->cliente->nome}}</td>
                            <td>{{ $venda->data_venda}}</td>
                            <td>
                                <a href="{{route('enviacomprovante.venda',$venda->id)}}" class="btn btn-secondary btn-sm">Enviar Email</a>
                                <a href="{{ route('atualizar.venda', $venda->id) }}" class="btn btn-light btn-sm">Editar</a>
                                <meta name='csrf-token' content="{{ csrf_token() }}" />
                                <a onclick="deleteRegistroPaginacao('{{ route('venda.delete') }}', {{$venda->id}})" class="btn btn-danger btn-sm">Excluir</a>
                            </td>
                        </tr>    
                    @endforeach
                </tbody>
            </table>
            <div class="py-4">
                {{ $findVenda->links() }}
            </div>
        @endif
    </div>
@endsection