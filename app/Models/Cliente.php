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
        'whatsapp',
        'cep',
        'logradouro',
        'numero',
        'bairro',
        'cidade',
        'estado',
        'observacoes'
    ];

    public function emprestimos()
    {
        return $this->hasMany(Emprestimo::class, 'cliente_id', 'id');
    }
}
