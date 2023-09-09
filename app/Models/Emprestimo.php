<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Emprestimo extends Model
{
    use HasFactory;

    protected $fillable = [
        'valor',
        'status',
    ];

    protected $casts = [
        'status' => 'boolean'
    ];

    public function cliente()
    {
        return $this->belongsTo(Cliente::class);
    }
    
}
