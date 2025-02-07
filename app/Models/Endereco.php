<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Endereco extends Model
{
    use HasFactory;

    protected $fillable = ['cliente_id', 'cep', 'rua', 'bairro', 'cidade', 'estado', 'numero', 'complemento'];

    public function cliente() {
        return $this->belongsTo('\App\Models\Cliente');
    }
}
