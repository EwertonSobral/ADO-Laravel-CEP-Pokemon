$(document).ready(function() {
    $('#cep-form').submit(function(event) {
        event.preventDefault();
        var cep = $('#cep').val();
        $.ajax({
            url: '/cep/' + cep,
            type: 'GET',
            success: function(result) {
                var cepResult = $('#cep-result');
                cepResult.empty();
                if (result.ok) {
                    cepResult.append('<p>CEP: ' + result.cep + '</p>');
                    cepResult.append('<p>Logradouro: ' + result.logradouro + '</p>');
                    cepResult.append('<p>Bairro: ' + result.bairro + '</p>');
                    cepResult.append('<p>Cidade: ' + result.cidade + '</p>');
                    cepResult.append('<p>UF: ' + result.uf + '</p>');
                    cepResult.append('<p>Número do Pokémon: ' + result['numero-pokemon'] + '</p>');
                    cepResult.append('<h3>O Pokémon localizado é: ' + result.pokemon + '</h3>');
                    cepResult.append('<img src="' + result['foto-pokemon'] + '">');
                } else {
                    cepResult.append('<p>CEP não encontrado.</p>');
                }
            },
            error: function() {
                alert('Erro ao buscar CEP.');
            }
        });
    });
});
