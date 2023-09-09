<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ParcelaEmprestimo extends Model
{
    use HasFactory;

    protected $table = 'parcelas_emprestimo';


    protected $fillable = [
        'emprestimo_id',
        'valor',
        'data_vencimento',
        'pago',
    ];
    public function emprestimo()
    {
        return $this->belongsTo(Emprestimo::class, 'emprestimo_id');
    }
}
