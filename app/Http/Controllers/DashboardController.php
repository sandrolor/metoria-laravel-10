<?php

namespace App\Http\Controllers;

use App\Models\Cliente;
use App\Models\Produto;
use App\Models\User;
use App\Models\Venda;
use Illuminate\Http\Request;

class DashboardController extends Controller
{
    public function index(){
        $totalDeProdutoCadastrado = $this->buscaTotalProdutoCadastrado();
        $totalDeClienteCadastrado = $this->buscaTotalClienteCadastrado();
        $totalDeVendaCadastrada = $this->buscaTotalVendaCadastrada();
        $totalDeUserCadastrado = $this->buscaTotalUserCadastrado();

        return view('pages.dashboard.dashboard', compact('totalDeProdutoCadastrado','totalDeClienteCadastrado', 'totalDeVendaCadastrada', 'totalDeUserCadastrado'));
    }

    public function buscaTotalProdutoCadastrado(){
        $findProduto = Produto::all()->count();
        return $findProduto;
    }

    public function buscaTotalClienteCadastrado(){
        $findCliente = Cliente::all()->count();
        return $findCliente;        
    }

    public function buscaTotalVendaCadastrada(){
        $findVenda = Venda::all()->count();
        return $findVenda;
    }

    public function buscaTotalUserCadastrado(){
        $findUser = User::all()->count();
        return $findUser;
    }
}
