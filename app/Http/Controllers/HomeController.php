<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Models\House;

class HomeController extends Controller
{
    public function filtrar(Request $request)
    {
        $house = new House();
        $casas = House::all();

        $filtro = $request->input('filtro');
        if ($filtro == 'casa-cara') {
            $casaMaisCara = House::orderBy('preco', 'desc')->first();
            return view('pages.imobiliaria', ['casaMaisCara' => $casaMaisCara, 'casas' => $casas]);
        } elseif ($filtro == 'casa-aluguel') {
            $Alugueis = House::where('venda', 'aluguel')->get();
            return view('pages.imobiliaria', ['Alugueis' => $Alugueis, 'casas' => $casas]);
        } elseif ($filtro == 'casa-venda') {
            $Vendas = House::where('venda', 'venda')->get();
            return view('pages.imobiliaria', ['Vendas' => $Vendas, 'casas' => $casas]);
        } elseif ($filtro == 'preco-asc') {
            $PrecoCresc = House::orderBy('preco', 'asc')->get();
            return view('pages.imobiliaria', ['PrecoCrescente' => $PrecoCresc, 'casas' => $casas]);
        } elseif ($filtro == 'endereco-asc') {
            $EnderecoCresc = House::orderBy('endereco', 'asc')->get();
            return view('pages.imobiliaria', ['EnderecoCrescente' => $EnderecoCresc, 'casas' => $casas]);
        }
    }

    public function inserir(Request $request)
    {
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
            $casas = House::all(); // Recupere todas as casas do banco de dados
            return view('pages.imobiliaria', compact('errorMessage', 'casas'));
        }

        // Criação de um novo imóvel no banco de dados usando um Model
        $house = new House();
        $house->nome = $nome_casa;
        $house->endereco = $endereco_casa;
        $house->preco = $preco_casa;
        $house->venda = $venda_aluguel;
        $house->save();
        $casas = House::all();
        // Recupere todas as casas do banco de dados
        return view('pages.imobiliaria', [
            'nome' => $nome_casa,
            'endereco' => $endereco_casa,
            'preco' => $preco_casa,
            'venda' => $venda_aluguel,
            'casas' => $casas
        ]);
        // Retorno da view com os dados processados
    }


    public function processForm(Request $request)
    {
        if ($request->has('filtro')) {
            return $this->filtrar($request);
        } elseif($request->input('nome')!='') {
            return $this->inserir($request);
        }
    }
    
    public function search(Request $request)
{
    $casas = House::all();
    $search = $request->input('Search');
    $casasPesquisadas = House::where('endereco', 'LIKE', '%' . $search . '%')->get();

    if ($casasPesquisadas->isEmpty()) {
        $mensagem = 'Nenhum imóvel encontrado';
        return view('pages.imobiliaria', [
            'CasasPesquisadas' => $casasPesquisadas,
            'casas' => $casas,
            'mensagem' => $mensagem
        ]);
    }

    return view('pages.imobiliaria', [
        'CasasPesquisadas' => $casasPesquisadas,
        'casas' => $casas
    ]);
}

    
}
