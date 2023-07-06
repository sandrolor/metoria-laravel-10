<?php

namespace App\Http\Controllers;

use App\Http\Requests\FormRequestUser;
use App\Models\User;
use Illuminate\Http\Request;
use Brian2694\Toastr\Facades\Toastr;
use Illuminate\Support\Facades\Hash;

class UsersController extends Controller
{
    public function __construct(User $user)
    {
        $this->user = $user;
    }

    //Paginação dos dados
    public function index(Request $request)
    {
        $pesquisar = $request->pesquisar; 
        $findUser = $this->user->getUsersPesquisaIndex(search: $pesquisar ?? '');
        
        return view('pages.users.paginacao', compact('findUser'));
    }

    public function delete(Request $request)
    {
        $id = $request->id;
        $buscaRegistro = User::find($id);
        $buscaRegistro->delete();
        Toastr::success('Dados excluídos com sucesso.');
        return response()->json(['success'=>true]);
    }

    public function cadastrarUser(FormRequestUser $request)
    {
        if ($request->method()=="POST"){
            //cria os dados
            $data = $request->all();
            $data['password'] = Hash::make($data['password']);
            User::create($data);
            Toastr::success('Dados gravados com sucesso.');
            return redirect()->route('user.index');
        }
        return view('pages.users.create');
    }

    public function atualizarUser(FormRequestUser $request, $id){
        if ($request->method()=="PUT"){
            //atualiza os dados
            $data = $request->all();
            $data['password'] = Hash::make($data['password']);
            $buscaRegistro = User::find($id);
            $buscaRegistro->update($data);
            Toastr::success('Dados gravados com sucesso.');
            return redirect()->route('user.index');
        }
        $findUser = User::where('id', '=', $id)->first();
        return view('pages.users.atualiza', compact('findUser'));
    }    
}
