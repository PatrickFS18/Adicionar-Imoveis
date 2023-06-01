<!DOCTYPE html>
<html lang="en">

<head>
    <title>Imobiliárias</title>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link href="css/style.css" rel="stylesheet">
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

        .form-group {
            margin-bottom: 20px;
        }

        label {
            display: block;
            margin-bottom: 5px;
            font-size: 18px;
            font-weight: bold;
        }

        input[type="text"],
        textarea {
            width: 100%;
            padding: 10px;
            font-size: 16px;
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

        .card {
            background-color: #222;
            padding: 20px;
            margin-bottom: 20px;
        }

        .card p {
            margin-bottom: 10px;
        }

        .card .btn {
            background-color: #dc3545;
        }

        .footer {
            text-align: center;
            padding: 10px;
            background-color: #222;
            color: #fff;
        }

        .filter-group {
            margin-top: 20px;
        }
    </style>
</head>

<body>
    <div class="container">
        <h1>Imobiliárias</h1>

        <form id="imobiliaria-form" class="form">
            <div class="form-group">
                <label for="imobiliaria-name">Nome da Casa</label>
                <input type="text" id="imobiliaria-name" name="imobiliaria-name" required>
            </div>

            <div class="form-group">
                <label for="imobiliaria-password">Preço da Casa</label>
                <input type="password" id="imobiliaria-password" name="imobiliaria-password" required>
            </div>

            <div class="form-group">
                <label for="imobiliaria-address">Endereço</label>
                <input type="text" id="imobiliaria-address" name="imobiliaria-address">
            </div>

            <section>
                <label for="imobiliaria-type">Tipo de Transação:</label>
                <div class="radio-options">
                    <label>
                        <input type="radio" name="imobiliaria-type" value="aluguel" checked>
                        Aluguel
                    </label>
                    <label>
                        <input type="radio" name="imobiliaria-type" value="venda">
                        Venda
                    </label>
                </div>
            </section>

            <div class="form-group">
                <button type="submit" class="btn">Cadastrar Casa</button>
            </div>
        </form>

        <div class="filter-group">
            <label for="filter-select">Filtrar por:</label>
            <select id="filter-select">
                <option value="casa-cara">Casa mais cara</option>
                <option value="casa-aluguel">Casa de aluguel</option>
                <option value="casa-venda">Casa de venda</option>
                <option value="preco-asc">Preço em ordem crescente</option>
                <option value="preco-desc">Preço em ordem decrescente</option>
            </select>
        </div>

        <div id="imoveis-container">
            <!-- Aqui serão exibidos os imóveis cadastrados -->
        </div>

        <div class="footer">
            &copy; 2023 Imobiliárias. Todos os direitos reservados.
        </div>
    </div>
</body>

</html>