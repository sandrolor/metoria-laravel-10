@extends('index')
@section('content')
    <form action="{{ route('cadastrar.venda') }}" method="POST">
        @csrf
        <div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">
            <h1 class="h2">Incluir Vendas</h1>
        </div>
        <div class="mb-3">
            <label class="form-label">Nº Venda</label>
            <input type="text" disabled class="form-control @error('numero_da_venda') is-invalid @enderror" id="numero_da_venda" name="numero_da_venda" value="{{  isset ($findNumeracao) ? $findNumeracao :  old('numero_da_venda')}}">
            @if ($errors->has('numero_da_venda'))
                <div class="invalid-feedback">{{ $errors->first('numero_da_venda') }}</div>                
            @endif
        </div>

        <div class="mb-3">
            <label class="form-label">Produto</label>
            <select class="form-select" aria-label="Default select example" name="produto_id" id="produto_id">
                <option selected>Clique para selecionar</option>
                @foreach ($findProduto as $Produto)
                    <option value="{{$Produto->id}}">{{$Produto->nome}}</option>    
                @endforeach
            </select>
        </div>

        <div class="mb-3">
            <label class="form-label">Cliente</label>
            <select class="form-select" aria-label="Default select example" name="cliente_id" id="cliente_id">
                <option selected>Clique para selecionar</option>
                @foreach ($findCliente as $Cliente)
                    <option value="{{$Cliente->id}}">{{$Cliente->nome}}</option>    
                @endforeach
            </select>
        </div>

        <div class="mb-3">
            <label class="form-label">Data</label>
            <input type="text" class="form-control @error('data_venda') is-invalid @enderror" id="data_venda" name="data_venda" value="{{old('data_venda')}}">
            @if ($errors->has('data_venda'))
                <div class="invalid-feedback">{{ $errors->first('data_venda') }}</div>                
            @endif
        </div>
        <button type="submit" class="btn btn-success">Salvar</button>
    </form>
@endsection