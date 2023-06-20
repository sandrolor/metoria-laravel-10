<?php

namespace App\Models;

use Illuminate\Pagination\Paginator;
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
        Paginator::useBootstrap();
        $produto = $this->where(function($query) use($search){
            $query->where('nome', $search);
            $query->orwhere('nome', 'LIKE', "%{$search}%");
        })->orderBy('nome')->paginate(5);

        return $produto;
    }
}
