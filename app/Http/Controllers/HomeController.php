<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Models\House;

class HomeController extends Controller
{
    public function InsertHouses(Request $request)
{
    // Acesso a dados de um formulário enviado via POST
    $nome_casa = $request->input('nome');
    $endereco_casa = $request->input('endereco');
    $preco_casa = $request->input('preco');
    $venda_aluguel = $request->input('venda');

    // Verificar se já existe um imóvel com os mesmos valores
    $existingHouse = House::where('nome', $nome_casa)
        ->where('endereco', $endereco_casa)
        ->where('preco', $preco_casa)
        ->where('venda', $venda_aluguel)
        ->first();

    if ($existingHouse) {
        // Imóvel já existe, faça algo, como exibir uma mensagem de erro
        $errorMessage = 'Imóvel já existe';
        return view('pages.imobiliaria', compact('errorMessage'));    }

    // Criação de um novo imóvel no banco de dados usando um Model
    $house = new House();
    $house->nome = $nome_casa;
    $house->endereco = $endereco_casa;
    $house->preco = $preco_casa;
    $house->venda = $venda_aluguel;
    $house->save();

    return view('pages.imobiliaria', ['nome' => $nome_casa, 'endereco' => $endereco_casa, 'preco' => $preco_casa, 'venda' => $venda_aluguel]);
    // Retorno da view com os dados processados
}
}