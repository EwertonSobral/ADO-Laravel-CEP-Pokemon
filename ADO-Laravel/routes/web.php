<?php

use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Http;

Route::get('/', function () {
    return view('cep');
});

Route::get('/cep/{cep}', function ($cep) {
    $cepData = Http::get("https://viacep.com.br/ws/{$cep}/json")->json();
    if (isset($cepData['erro'])) {
        return response()->json(['ok' => false]);
    }
    $logradouro = $cepData['logradouro'];
    $bairro = $cepData['bairro'];
    $cidade = $cepData['localidade'];
    $uf = $cepData['uf'];
    $numeroPokemon = (int) substr($cep, 2, 3);
    $pokemonData = Http::get("https://pokeapi.co/api/v2/pokemon/{$numeroPokemon}")->json();
    if (isset($pokemonData['detail']) && $pokemonData['detail'] == 'Not found.') {
        $pokemon = 'N/A';
        $numeroPokemon = 0;
        $fotoPokemon = '';
    } else {
        $pokemon = $pokemonData['name'];
        $fotoPokemon = $pokemonData['sprites']['other']['official-artwork']['front_default'];
    }
    return response()->json([
        'ok' => true,
        'cep' => $cep,
        'logradouro' => $logradouro,
        'bairro' => $bairro,
        'cidade' => $cidade,
        'uf' => $uf,
        'numero-pokemon' => $numeroPokemon,
        'pokemon' => strtoupper($pokemon),
        'foto-pokemon' => $fotoPokemon
    ]);
});
