<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Produto extends Model
{
    use HasFactory;

    protected $fillable = [
        'nome',
        'valor',
    ];

    public function getProdutosPesquisaIndex(string $search = '')
    {
        $produto = $this->where(function($query) use($search){
            $query->where('nome', $search);
            $query->orwhere('nome', 'LIKE', "%{$search}%");
        })->get();

        return $produto;
        

    
    }
}
