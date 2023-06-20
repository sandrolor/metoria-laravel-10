<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Pagination\Paginator;

class Venda extends Model
{
    use HasFactory;

    protected $fillable = [
        'numero_da_venda',
        'produto_id',
        'cliente_id',
        'data_venda',
    ];

    public  function produto(){
        return $this->belongsTo(Produto::class);
    }

    public  function cliente(){
        return $this->belongsTo(Cliente::class);
    }

    public function getVendasPesquisaIndex(string $search = '')
    {
        Paginator::useBootstrap();
        $venda = $this->where(function($query) use($search){
            $query->where('numero_da_venda', $search);
            $query->orwhere('numero_da_venda', 'LIKE', "%{$search}%");
        })->orderBy('data_venda')->paginate(5);

        return $venda;
    }
}
