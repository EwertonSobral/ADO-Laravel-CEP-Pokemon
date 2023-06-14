<!DOCTYPE html>
<html>
<head>
    <title>Pesquisar CEP</title>
</head>
<body>
    <form id="cep-form">
        <label for="cep">
            <h2>Digite o CEP para encontrar um Pokémon:</h2>
        <br>
        </label>
        <input type="text" name="cep" id="cep" required>
        <button type="submit">Pesquisar</button>
    </form>
    <div id="cep-result"></div>

    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <script src="{{ asset('js/cep.js') }}"></script>
</body>
</html>
