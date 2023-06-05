<!DOCTYPE html>
<html lang="en">

<head>
  <title>Imobiliárias</title>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link href="css/style.css" rel="stylesheet">
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-9ndCyUaIbzAi2FUVXJi0CjmCapSmO7SnpJef0486qhLnuZ2cdeRhO02iuK6FUUVM" crossorigin="anonymous">
  <style>
    body {
      background-image: linear-gradient(to bottom, #222, #000);
      color: #fff;
      font-family: Arial, sans-serif;
      margin: 0;
      padding: 0;
    }

    .container {
      max-width: 800px;
      margin: 0 auto;
      padding: 20px;
    }

    h1 {
      text-align: center;
      margin-bottom: 30px;
    }

    .table {
      background-color: #222;
      color: #fff;
      border-radius: 5px;
    }

    .table th,
    .table td {
      padding: 10px;
      border-bottom: 1px solid #444;
    }

    .btn {
      display: inline-block;
      padding: 10px 20px;
      font-size: 16px;
      font-weight: bold;
      text-decoration: none;
      background-color: #007bff;
      color: #fff;
      border: none;
      cursor: pointer;
    }

    .footer {
      text-align: center;
      padding: 10px;
      background-color: #222;
      color: #fff;
      margin-top: 2em;
    }
  </style>
</head>

<body>
  <div class="container">
    <h1>Adicionar Imóvel</h1>
    @if(isset($errorMessage))
    <h3>
      <div class="alert alert-danger" style="margin: 10px;">
        {{ $errorMessage }}
      </div>
    </h3>
    @endif

    <form id="imobiliaria-form" class="form" method="POST" action="{{ route('inserir') }}" style="margin-bottom: 2em;">
      @csrf

      <div class="form-group">
        <label for="imobiliaria-name">Nome da Casa</label>
        <input type="text" id="imobiliaria-name" name="nome" required>
      </div>

      <div class="form-group">
        <label for="imobiliaria-price">Preço da Casa</label>
        <input type="text" id="imobiliaria-price" name="preco" required>
      </div>

      <div class="form-group">
        <label for="imobiliaria-address">Endereço</label>
        <input type="text" id="imobiliaria-address" name="endereco">
      </div>

      <section>
        <label for="imobiliaria-type">Tipo de Transação:</label>
        <div class="radio-options">
          <select name="venda">
            <option value="Aluguel">Aluguel</option>
            <option value="Venda">Venda</option>
          </select>
        </div>
      </section>

      <div class="form-group">
        <input type="submit" class="btn" style="margin-left: 40%;" value="Inserir">
      </div>
    </form>

    <h1>Imóveis</h1>
    <div id="imoveis-container">
      <table class="table">
        <thead>
          <tr>

            <th>ID</th>
            <th>Nome da Casa</th>
            <th>Preço</th>
            <th>Endereço</th>
            <th>Tipo</th>
            <th>Ações</th>
          </tr>
        </thead>
        <tbody>
          @if(isset($casas) && count($casas) > 0)
          @foreach($casas as $casa)
          <tr>
            <td>{{ $casa->ID }}</td>
            <td>{{ $casa->nome }}</td>
            <td>{{ $casa->preco }}</td>
            <td>{{ $casa->endereco }}</td>
            <td>{{ $casa->venda }}</td>

            <td>

              <form id="editar-form-{{ $casa->ID }}" class="form" method="POST" action="{{ route('editar')}}">
                @csrf
                <button type="submit" class="btn btn-edit" name="editar" value="{{ $casa->ID }}">Editar</button>
              </form>
              <form id="delete-form-{{ $casa->ID }}" class="form" method="POST" action="{{ route('excluir') }}">
    @csrf
    <input type="hidden" name="id-excluir" value="{{ $casa->ID }}">
    <input type="submit" class="btn btn-edit" name="excluir" value="Excluir">
</form>





          </tr>
          @endforeach
          @else
          <tr>
            <td colspan="5">Nenhum imóvel disponível</td>
          </tr>
          @endif
        </tbody>
        @if (Session::has('successMessage'))
    <div class="alert alert-success">
        {{ Session::get('successMessage') }}
    </div>
@endif

@if (Session::has('errorMessage'))
    <div class="alert alert-danger">
        {{ Session::get('errorMessage') }}
    </div>
@endif
      </table>
    </div>
    <form id="filtro-form" class="form" method="POST" action="{{ route('filtrar') }}">
      @csrf

      <div class="filter-group">
        <label for="filter-select">Buscar por:</label>
        <select id="filter-select" name="filtro">
          <option value="casa-cara">Casa mais cara</option>
          <option value="casa-aluguel">Casa de aluguel</option>
          <option value="casa-venda">Casa de venda</option>
          <option value="preco-asc">Preço em ordem crescente</option>
          <option value="endereco-asc">Endereço em ordem crescente</option>
        </select>
        <button type="submit" class="btn">Filtrar</button>
      </div>
    </form>
    <div style="margin-top:1em"></div>
    @if(isset($casaMaisCara))
    <h1>Casa mais cara:</h1>
    <div id="casa-cara">
      <table class="table">
        <thead>
          <tr>
            <th>Nome da Casa</th>
            <th>Preço</th>
            <th>Endereço</th>
            <th>Tipo</th>
          </tr>
        </thead>
        <tbody>
          <tr>
            <td>{{ $casaMaisCara->nome }}</td>
            <td>{{ $casaMaisCara->preco }}</td>
            <td>{{ $casaMaisCara->endereco }}</td>
            <td>{{ $casaMaisCara->venda }}</td>
          </tr>
        </tbody>
      </table>
    </div>
    @endif

    @if(isset($Alugueis))
    <h1>Casas de aluguel:</h1>
    <div id="casa-aluguel">
      <table class="table">
        <thead>
          <tr>
            <th>Nome da Casa</th>
            <th>Preço</th>
            <th>Endereço</th>
            <th>Tipo</th>
          </tr>
        </thead>
        <tbody>
          @foreach($Alugueis as $casa)
          <tr>
            <td>{{ $casa->nome }}</td>
            <td>{{ $casa->preco }}</td>
            <td>{{ $casa->endereco }}</td>
            <td>{{ $casa->venda }}</td>
          </tr>
          @endforeach
        </tbody>
      </table>
    </div>
    @endif

    @if(isset($Vendas))
    <h1>Casas de venda:</h1>
    <div id="casa-venda">
      <table class="table">
        <thead>
          <tr>
            <th>Nome da Casa</th>
            <th>Preço</th>
            <th>Endereço</th>
            <th>Tipo</th>
          </tr>
        </thead>
        <tbody>
          @foreach($Vendas as $casa)
          <tr>
            <td>{{ $casa->nome }}</td>
            <td>{{ $casa->preco }}</td>
            <td>{{ $casa->endereco }}</td>
            <td>{{ $casa->venda }}</td>
          </tr>
          @endforeach
        </tbody>
      </table>
    </div>
    @endif

    @if(isset($PrecoCrescente))
    <h1>Preço em ordem crescente:</h1>
    <div id="preco-asc">
      <table class="table">
        <thead>
          <tr>
            <th>Nome da Casa</th>
            <th>Preço</th>
            <th>Endereço</th>
            <th>Tipo</th>
          </tr>
        </thead>
        <tbody>
          @foreach($PrecoCrescente as $casa)
          <tr>
            <td>{{ $casa->nome }}</td>
            <td>{{ $casa->preco }}</td>
            <td>{{ $casa->endereco }}</td>
            <td>{{ $casa->venda }}</td>
          </tr>
          @endforeach
        </tbody>
      </table>
    </div>
    @endif

    @if(isset($EnderecoCrescente))
    <h1>Endereco Crescente:</h1>
    <div id="preco-desc">
      <table class="table">
        <thead>
          <tr>
            <th>Nome da Casa</th>
            <th>Preço</th>
            <th>Endereço</th>
            <th>Tipo</th>
          </tr>
        </thead>
        <tbody>
          @foreach($EnderecoCrescente as $casa)
          <tr>
            <td>{{ $casa->nome }}</td>
            <td>{{ $casa->preco }}</td>
            <td>{{ $casa->endereco }}</td>
            <td>{{ $casa->venda }}</td>
          </tr>
          @endforeach
        </tbody>
      </table>
    </div>
    @endif

    <form id="filtro-form" class="form" method="POST" action="{{ route('search') }}">
      @csrf

      <div class="filter-group">
        <label for="filter-input">Procurar:</label>
        <input type="text" id="filter-input" name="Search" placeholder="Digite um trecho do endereço">
        <input type="submit" class="btn" value="Pesquisar">
      </div>
    </form>
    @if(isset($CasasPesquisadas))
    <h1>Resultados da pesquisa:</h1>
    <div id="resultados-pesquisa">
      <table class="table">
        <thead>
          <tr>
            <th>Nome da Casa</th>
            <th>Preço</th>
            <th>Endereço</th>
            <th>Tipo</th>
          </tr>
        </thead>
        <tbody>
          @foreach($CasasPesquisadas as $casa)
          <tr>
            <td>{{ $casa->nome }}</td>
            <td>{{ $casa->preco }}</td>
            <td>{{ $casa->endereco }}</td>
            <td>{{ $casa->venda }}</td>
          </tr>
          @endforeach
        </tbody>
      </table>
    </div>
    @endif
    @if(isset($mensagem))
    <p>{{ $mensagem }}</p>
    @endif
    <div class="footer">
      &copy; 2023 Imobiliárias. Todos os direitos reservados. </div>
  </div>
</body>

</html>