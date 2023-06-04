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
  background-color: #222;
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
  margin-bottom: 20px;
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

.form-group {
  margin-bottom: 20px;
}

.form-group label {
  display: block;
  margin-bottom: 5px;
}

.form-group input,
.form-group select {
  width: 100%;
  padding: 8px;
  font-size: 16px;
  border: 1px solid #ccc;
  border-radius: 4px;
}

.form-group input[type="submit"] {
  margin-left: 40%;
}

.form-group input[type="text"]:focus,
.form-group select:focus {
  outline: none;
  border-color: #007bff;
}

.alert {
  margin: 10px;
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

        <form id="imobiliaria-form" class="form" method="POST" action="{{ route('processForm') }}" style="margin-bottom: 2em;">
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
                <label for="imobiliaria-description">Descrição</label>
                <textarea id="imobiliaria-description" name="descricao"></textarea>
            </div>

            <div class="form-group">
                <button type="submit" class="btn btn-primary">Adicionar Imóvel</button>
            </div>
        </form>

        <div class="footer">
            &copy; 2023 Imobiliárias. Todos os direitos reservados.
        </div>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js" integrity="sha384-fTq1GfyuazQSPv4tRgB0+NEi1Jb5wZSS50sH3E4e5r7JZ03ejh2OoQtwep4JYK8E" crossorigin="anonymous"></script>
</body>

</html>
