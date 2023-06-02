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
            background-color: #000;
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

        <form id="imobiliaria-form" class="form" method="POST" action="{{ route('casas.insert') }}" style="margin-bottom: 2em;">
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
                    <label>
                        <input type="radio" name="venda" value="0" checked>
                        Aluguel
                    </label>
                    <label>
                        <input type="radio" name="venda" value="1">
                        Venda
                    </label>
                </div>
            </section>

            <div class="form-group">
                <button type="submit" class="btn" style=" margin-left:40%;">Cadastrar Casa</button>
            </div>
        </form>

        <h1>Imóveis</h1>
        <div id="imoveis-container">
            <table class="table">
                <thead>
                    <tr>
                        <th>Nome da Casa</th>
                        <th>Preço</th>
                        <th>Endereço</th>
                        <th>Tipo</th>
                        <th>Ações</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach($casas as $casa)
                    <tr>
                        <td>{{ $casa->nome }}</td>
                        <td>{{ $casa->preco }}</td>
                        <td>{{ $casa->endereco }}</td>
                        <td>{{ $casa->venda ? 'Venda' : 'Aluguel' }}</td>
                        <td>
                            <a href="#" class="btn btn-edit">Editar</a>
                            <a href="#" class="btn btn-delete">Excluir</a>
                        </td>
                    </tr>
                    @endforeach
                </tbody>
            </table>
        </div>

        <footer>
            <div class="footer">
                &copy; 2023 Imobiliárias. Todos os direitos reservados.
            </div>
        </footer>
    </div>
</body>

</html>
