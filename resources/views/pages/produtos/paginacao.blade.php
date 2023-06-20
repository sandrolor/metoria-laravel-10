@extends('index')
@section('content')
<div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">
    <h1 class="h2">Produtos</h1>
</div>
<div>
    <form action="{{ route('produto.index') }}" method="GET" class="form-inline">
        <div class="form-group mx-sm-3 mb-2">
            <input type="text" class="form" name="pesquisar" id="pesquisar" placeholder="Digite o nome" value="{{ old('pesquisar')}}" />
            <button class="btn btn-secondary">Pesquisar</button>
            <a href="{{ route('cadastrar.produto') }}" type="button" class="btn btn-success float-end">Novo Produto</a>
        </div>
    </form>
    <div class="table-responsive small mt-4">
        @if ($findProduto->isEmpty())
            <p>Não existem dados</p>
        @else
            <table class="table table-striped table-sm">
                <thead>
                    <tr>
                        <th scope="col">Nome</th>
                        <th scope="col">Valor</th>
                        <th scope="col">Ações</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($findProduto as $produto)
                        <tr>
                            <td>{{$produto->nome}}</td>
                            <td>{{ 'R$' . ' ' . number_format($produto->valor, 2, ',', '.') }}</td>
                            <td>
                                <a href="{{ route('atualizar.produto', $produto->id) }}" class="btn btn-light btn-sm">Editar</a>
                                <meta name='csrf-token' content="{{ csrf_token() }}" />
                                <a onclick="deleteRegistroPaginacao('{{ route('produto.delete') }}', {{$produto->id}})" class="btn btn-danger btn-sm">Excluir</a>
                            </td>
                        </tr>    
                    @endforeach
                </tbody>
            </table>
            <div class="py-4">
                {{ $findProduto->links() }}
            </div>
        @endif
    </div>
@endsection