<?php

namespace App\Models;

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
        $cliente = $this->where(function($query) use($search){
            $query->where('nome', $search);
            $query->orwhere('nome', 'LIKE', "%{$search}%");
        })->get();

        return $cliente;
    }
}
