<?php

namespace App\Http\Controllers;

use App\Http\Requests\FormRequestVenda;
use App\Mail\ComprovanteDeVendaEmail;
use App\Models\Cliente;
use App\Models\Venda;
use App\Models\Componentes;
use App\Models\Produto;
use Illuminate\Http\Request;
use Brian2694\Toastr\Facades\Toastr;
use Illuminate\Support\Facades\Mail;

class VendasController extends Controller
{
    public function __construct(Venda $venda)
    {
        $this->venda = $venda;
    }

    //Paginação dos dados
    public function index(Request $request)
    {
        $pesquisar = $request->pesquisar; 
        $findVenda = $this->venda->getVendasPesquisaIndex(search: $pesquisar ?? '');
        
        return view('pages.vendas.paginacao', compact('findVenda'));
    }

    public function delete(Request $request)
    {
        $id = $request->id;
        $buscaRegistro = Venda::find($id);
        $buscaRegistro->delete();
        Toastr::success('Dados excluídos com sucesso.');
        return response()->json(['success'=>true]);
    }

    public function cadastrarVenda(FormRequestVenda $request)
    {
        $findNumeracao = Venda::max('numero_da_venda')+ 1;
        $findProduto = Produto::all();
        $findCliente = Cliente::all();

        if ($request->method()=="POST"){
            //cria os dados
            $data = $request->all(); 
            $data['numero_da_venda'] = $findNumeracao;
            Venda::create($data);
            Toastr::success('Dados gravados com sucesso.');
            return redirect()->route('venda.index');
        }
        return view('pages.vendas.create', compact('findNumeracao', 'findProduto', 'findCliente'));
    }

    public function atualizarVenda(FormRequestVenda $request, $id){
        if ($request->method()=="PUT"){
            //atualiza os dados
            $data = $request->all();
            $buscaRegistro = Venda::find($id);
            $buscaRegistro->update($data);
            Toastr::success('Dados gravados com sucesso.');
            return redirect()->route('venda.index');
        }
        $findVenda = Venda::where('id', '=', $id)->first();
        return view('pages.vendas.atualiza', compact('findVenda'));
    }

    public function enviaComprovantePorEmail($id){
        $buscaVenda = Venda::where('id', '=', $id)->first();
        $produtoNome = $buscaVenda->produto->nome;
        $clienteEmail = $buscaVenda->cliente->email;
        $clienteNome = $buscaVenda->cliente->nome;
        $sendMailData = [
            'produtoNome' => $produtoNome,
            'clienteNome'=> $clienteNome,
        ];
        Mail::to($clienteEmail)->send(new ComprovanteDeVendaEmail($sendMailData));
        Toastr::success('Email enviado com sucesso.');
        return redirect()->route('venda.index');
    }
}
