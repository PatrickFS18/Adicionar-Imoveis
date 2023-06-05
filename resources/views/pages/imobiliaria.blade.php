<!DOCTYPE html>
<html lang="en">

<head>
  <title>Imobiliárias</title>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link href="css/style.css" rel="stylesheet">
  <link rel="stylesheet" href="path/to/font-awesome/css/font-awesome.min.css">
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-9ndCyUaIbzAi2FUVXJi0CjmCapSmO7SnpJef0486qhLnuZ2cdeRhO02iuK6FUUVM" crossorigin="anonymous">
  <style>
    body {
      background-image: linear-gradient(to bottom, #222, #000);
      color: #fff;
      font-family: Arial, sans-serif;
      margin: 0;
      padding: 0;
    }

    label {
      color: black;
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

    .form-container {
      max-width: 400px;
      margin: 0 auto;
      padding: 20px;
      background-color: #f9f9f9;
      border: 1px solid #ccc;
      border-radius: 5px;
    }

    .form-container label {
      display: block;
      margin-bottom: 10px;
    }

    .form-container select,
    .form-container input[type="text"],
    .form-container input[type="number"] {
      width: 100%;
      padding: 10px;
      margin-bottom: 20px;
      border: 1px solid #ccc;
      border-radius: 4px;
      box-sizing: border-box;
    }

    .form-container button {
      background-color: #4CAF50;
      color: white;
      padding: 10px 20px;
      border: none;
      border-radius: 4px;
      cursor: pointer;
      font-size: 16px;
    }

    .form-container button:hover {
      background-color: #45a049;
    }

    .sidebar {
            position: fixed;
            top: 0;
            bottom: 0;
            left: -250px;
            z-index: 1000;
            width: 250px;
            padding: 20px;
            background-color: #343a40;
            transition: all 0.3s ease;
        }

        .sidebar.active {
            left: 0;
        }

        .content {
            margin-left: 250px;
            transition: all 0.3s ease;
        }

        .content.active {
            margin-left: 0;
        }

  </style>

</head>

<body>
<div class="container-fluid">
        <div class="row flex-nowrap">
            <div class="col-auto col-md-3 col-xl-2 px-sm-2 px-0">
                <button class="btn btn-dark" id="sidebarToggle">-></button>
                <div class="sidebar">
                    <div class="d-flex flex-column align-items-center align-items-sm-start px-3 pt-2 text-white min-vh-100">
                        <a href="/" class="d-flex align-items-center pb-3 mb-md-0 me-md-auto text-white text-decoration-none">
                            <span class="fs-5 d-none d-sm-inline">Menu</span>
                        </a>
                        <ul class="nav nav-pills flex-column mb-sm-auto mb-0 align-items-center align-items-sm-start" id="menu">
                            <li class="nav-item">
                                <a href="#inserir-imovel" class="nav-link align-middle px-0">
                                    <i class="fs-4 bi-house"></i> <span class="ms-1 d-none d-sm-inline">Inserir Imóvel</span>
                                </a>
                            </li>
                            <li>
                                <a href="#buscar-por" class="nav-link px-0 align-middle">
                                    <i class="fs-4 bi-search"></i> <span class="ms-1 d-none d-sm-inline">Buscar Por</span>
                                </a>
                            </li>
                            <li>
                                <a href="#pesquisar" class="nav-link px-0 align-middle">
                                    <i class="fs-4 bi-search"></i> <span class="ms-1 d-none d-sm-inline">Pesquisar</span>
                                </a>
                            </li>
                            <li>
                                <a href="#editar" class="nav-link px-0 align-middle">
                                    <i class="fs-4 bi-pencil"></i> <span class="ms-1 d-none d-sm-inline">Editar</span>
                                </a>
                            </li>
                        </ul>
                    </div>
                </div>
            </div>
  <div class="container">
    <h1 id="inserir-imovel">Adicionar Imóvel</h1>
    @if(isset($errorMessage))
    <h3>
      <div class="alert alert-danger" style="margin: 10px;">
        {{ $errorMessage }}
      </div>
    </h3>
    @endif
    <div class="form-container">
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
    </div>
    <h1 style="margin-top:3em">Imóveis</h1>
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



              <form action="{{ route('excluir', $casa->ID) }}" method="POST">
                @csrf
                @method('DELETE')
                <button class="btn btn-danger" type="submit" style="margin-top:5px">Excluir</button>
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

      <h2 style="margin-left:9em;margin-top:2em" id="editar">Editar Imóvel</h2>
      <div class="form-container" style="margin-top:1em">
        <form action="{{ route('editar') }}" method="POST">
          @csrf

          <label for="editar">Selecione uma casa:</label>
          <select name="editar" id="editar">
            @foreach ($casas as $casa)
            <option value="{{ $casa->ID }}">{{ $casa->nome }}</option>
            @endforeach
          </select>

          <label for="nome" style="color: black;">Nome:</label>
          <input type="text" name="nome" id="nome">

          <label for="endereco" style="color: black;">Endereço:</label>
          <input type="text" name="endereco" id="endereco">

          <label for="preco" style="color: black;">Preço:</label>
          <input type="number" name="preco" id="preco">

          <label for="imobiliaria-type">Tipo de Transação:</label>
          <div class="radio-options">
            <select name="venda">
              <option value="Aluguel">Aluguel</option>
              <option value="Venda">Venda</option>
            </select>
          </div>

          <button type="submit">Atualizar</button>
        </form>
      </div>



    </div>
    <form id="filtro-form" class="form-container" method="POST" action="{{ route('filtrar') }}" style="margin-top:4em;margin-bottom:4em">
      @csrf

      <div class="filter-group">
        <label for="filter-select" id="buscar-por">Buscar por:</label>
        <select id="filter-select" name="filtro">
          <option value="casa-cara">Casa mais cara</option>
          <option value="casa-aluguel">Casa de aluguel</option>
          <option value="casa-venda">Casa de venda</option>
          <option value="preco-asc">Preço em ordem crescente</option>
          <option value="endereco-asc">Endereço em ordem crescente</option>
        </select>
        <br>
        <br>

        &nbsp;
        <button type="submit" class="btn" style="margin-left:30%">Filtrar</button>
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

      <div class="form-container">
        <label for="filter-input">Procurar:</label>
        <input type="text" id="filter-input" name="Search" placeholder="Digite um trecho do endereço">
        <br>
        <br>
        &nbsp;
        <input type="submit" class="btn" id="pesquisar" value="Pesquisar" style="margin-left:30%">
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
  <script src="https://stackpath.bootstrapcdn.com/bootstrap/5.0.0-alpha1/js/bootstrap.bundle.min.js"></script>
    <script>
        const sidebarToggle = document.getElementById('sidebarToggle');
        const sidebar = document.querySelector('.sidebar');
        const content = document.querySelector('.content');

        sidebarToggle.addEventListener('click', () => {
            sidebar.classList.toggle('active');
            content.classList.toggle('active');
        });
    </script>
</body>

</html>