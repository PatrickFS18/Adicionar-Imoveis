<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Models\House;

use Illuminate\Support\Facades\Session;

class HomeController extends Controller
{
    public function carregarTodasCasas()
    {
        $casas = House::all();
        return view('pages.imobiliaria', [
            'casas' => $casas
        ]);
    }

    public function index()
    {
        return $this->carregarTodasCasas();
    }

    public function filtrar(Request $request)
    {
        if ($request->has('filtro')) {
            //Filtrar
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

            return redirect('/')->with([
                'casas' => $casas,
                'errorMessage' => $errorMessage
            ]);
        }

        // Criação de um novo imóvel no banco de dados usando um Model
        $house = new House();
        $house->nome = $nome_casa;
        $house->endereco = $endereco_casa;
        $house->preco = $preco_casa;
        $house->venda = $venda_aluguel;
        $house->save();

        // Redirecionar para a rota raiz ("/")
        return redirect('/');
    }

    public function excluir(Request $id)
    {

        $Imovel = House::where("id",$id["id"]);
        $Result=$Imovel->delete();
        if ($Result) {

            $successMessage = 'Casa excluída com sucesso.';
            session()->flash('successMessage', $successMessage);
        } else {
            $errorMessage = 'Casa não encontrada.';
            session()->flash('errorMessage', $errorMessage);
        }

        $casas = House::all();
        return redirect('/')->with([
            'casas' => $casas
        ]);
    }

    public function atualizar(Request $request)
    {
        $house = House::where("id", $request->input('editar'))->first();
        $nome_casa = $request->input('nome');
        $endereco_casa = $request->input('endereco');
        $preco_casa = $request->input('preco');
        $venda_aluguel = $request->input('venda');

        // Buscar a casa no banco de dados pelo ID

        if (!$house) {
            // Casa não encontrada, faça algo, como exibir uma mensagem de erro
            $errorMessage = 'Casa não encontrada';
            $casas = House::all(); // Recupere todas as casas do banco de dados
            return redirect('/')->with([
                'casas' => $casas,
                'errorMessage' => $errorMessage
            ]);
        }

        // Atualizar os valores da casa
        $house->nome = $nome_casa;
        $house->endereco = $endereco_casa;
        $house->preco = $preco_casa;
        $house->venda = $venda_aluguel;
        $soma=['nome'=>$house->nome,'endereco'=> $house->endereco,'preco'=> $house->preco,'venda'=> $house->venda];
        $house = House::where("id", $request->input('editar'))->update($soma);
        $sucessMessage = 'Casa editada com sucesso!';


        // Redirecionar para a rota raiz ("/")
        return redirect('/')->with([
            'sucessMessage' => $sucessMessage
        ]);
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
