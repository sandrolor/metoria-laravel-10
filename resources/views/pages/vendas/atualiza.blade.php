@extends('index')
@section('content')
    <form action="{{ route('atualizar.venda', $findVenda->id) }}" method="POST">
        @csrf
        @method('PUT')
        <div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">
            <h1 class="h2">Editar Vendas</h1>
        </div>
        <div class="mb-3">
            <label class="form-label">Nº Venda</label>
            <input type="text" class="form-control @error('numero_da_venda') is-invalid @enderror" id="numero_da_venda" name="numero_da_venda" value="{{isset ($findVenda->numero_da_venda) ? $findVenda->numero_da_venda : old('numero_da_venda')}}">
            @if ($errors->has('numero_da_venda'))
                <div class="invalid-feedback">{{ $errors->first('numero_da_venda') }}</div>                
            @endif
        </div>
        <div class="mb-3">
            <label class="form-label">Produto</label>
            <input type="text" class="form-control @error('produto_id') is-invalid @enderror" id="produto_id" name="produto_id" value="{{isset ($findVenda->produto_id) ? $findVenda->produto_id : old('produto_id')}}">
            @if ($errors->has('produto_id'))
                <div class="invalid-feedback">{{ $errors->first('produto_id') }}</div>                
            @endif
        </div>
        <div class="mb-3">
            <label class="form-label">Cliente</label>
            <input type="text" class="form-control @error('cliente_id') is-invalid @enderror" id="cliente_id" name="cliente_id" value="{{isset ($findVenda->cliente_id) ? $findVenda->cliente_id : old('cliente_id')}}">
            @if ($errors->has('cliente_id'))
                <div class="invalid-feedback">{{ $errors->first('cliente_id') }}</div>                
            @endif
        </div>
        <div class="mb-3">
            <label class="form-label">Data</label>
            <input type="text" class="form-control @error('data_venda') is-invalid @enderror" id="data_venda" name="data_venda" value="{{isset ($findVenda->data_venda) ? $findVenda->data_venda : old('data_venda')}}">
            @if ($errors->has('data_venda'))
                <div class="invalid-feedback">{{ $errors->first('data_venda') }}</div>                
            @endif
        </div>
        <button type="submit" class="btn btn-success">Salvar</button>
    </form>
@endsection