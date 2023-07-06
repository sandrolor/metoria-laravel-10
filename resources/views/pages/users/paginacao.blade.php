@extends('index')
@section('content')
<div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">
    <h1 class="h2">Usuários</h1>
</div>
<div>
    <form action="{{ route('user.index') }}" method="GET" class="form-inline">
        <div class="form-group mx-sm-3 mb-2">
            <input type="text" class="form" name="pesquisar" id="pesquisar" placeholder="Digite o nome" value="{{ old('pesquisar')}}" />
            <button class="btn btn-secondary">Pesquisar</button>
            <a href="{{ route('cadastrar.user') }}" type="button" class="btn btn-success float-end">Novo Usuário</a>
        </div>
    </form>
    <div class="table-responsive small mt-4">
        @if ($findUser->isEmpty())
            <p>Não existem dados</p>
        @else
            <table class="table table-striped table-sm">
                <thead>
                    <tr>
                        <th scope="col">Nome</th>
                        <th scope="col">E-mail</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($findUser as $user)
                        <tr>
                            <td>{{ $user->name}}</td>
                            <td>{{ $user->email}}</td>
                            <td>
                                <a href="{{ route('atualizar.user', $user->id) }}" class="btn btn-light btn-sm">Editar</a>
                                <meta name='csrf-token' content="{{ csrf_token() }}" />
                                <a onclick="deleteRegistroPaginacao('{{ route('user.delete') }}', {{$user->id}})" class="btn btn-danger btn-sm">Excluir</a>
                            </td>
                        </tr>    
                    @endforeach
                </tbody>
            </table>
            <div class="py-4">
                {{ $findUser->links() }}
            </div>
        @endif
    </div>
@endsection