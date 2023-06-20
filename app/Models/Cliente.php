<?php

namespace App\Models;

use Illuminate\Pagination\Paginator;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Cliente extends Model
{
    use HasFactory;

    protected $fillable = [
        'nome',
        'email',
        'endereco',
        'logradouro',
        'cep',
        'bairro',
    ];

    public function getClientesPesquisaIndex(string $search = '')
    {
        Paginator::useBootstrap();
        $cliente = $this->where(function($query) use($search){
            $query->where('nome', $search);
            $query->orwhere('nome', 'LIKE', "%{$search}%");
        })->orderBy('nome')->paginate(5);

        return $cliente;
    }
}
