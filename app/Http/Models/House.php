<?php

namespace App\Http\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class House extends Model
{
    use HasFactory;

    protected $fillable = ['nome', 'endereco', 'preco', 'venda'];

    // Defina o nome da tabela (opcional, se estiver usando o padrão)
    protected $table = 'houses';
    public $timestamps = false;
}

