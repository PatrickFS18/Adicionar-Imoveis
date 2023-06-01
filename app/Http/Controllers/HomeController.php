<?php

namespace App\Http\Controllers;
use Illuminate\Http\Request;
use App\Models\House;
class HomeController extends Controller
{
    public $timestamps = false;

    public function InsertHouses(Request $request)
    {
        // Acesso a dados de um formulário enviado via POST
        $nome_casa = $request->input('nome');
        $endereco_casa = $request->input('endereco');
        $preco_casa = $request->input('preco');
        $venda_aluguel = $request->input('venda');
        // Criação de um novo imóvel no banco de dados usando um Model
        $House = new House();
        $House->nome= $nome_casa;
        $House->endereco= $endereco_casa;
        $House->preco = $preco_casa;
        $House->venda= $venda_aluguel;
        $House->save();

        return view('welcome', ['nome' => $nome_casa, 'endereco' => $endereco_casa,'preco' =>$preco_casa,'venda' =>$venda_aluguel]);
        // Retorno da view com os dados processados
    }
}