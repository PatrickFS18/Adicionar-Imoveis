<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class House extends Model
{
    protected $fillable = ['nome', 'endereco', 'preco', 'venda'];

    // Defina o nome da tabela (opcional, se estiver usando o padrão)
    protected $table = 'casas';

}

