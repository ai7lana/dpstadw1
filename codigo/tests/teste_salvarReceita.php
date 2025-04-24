<?php
require_once "../conexao.php";
require_once "../funcoes.php";

$nome_comida = "Lasanha";
$tipo = "Jantar";
$ingredientes = "Massa, queijo, molho de tomate";
$modo_de_preparo = "Refogue cebola e alho no azeite. Adicione carne moída e cozinhe até dourar.....";
$tempo = "1h";
$rendimento = "6 porções";
$foto = "./imagens/lasanha.jpg";
$regiao = "Sudeste";
$perfil_idperfil = 1;

salvarReceita($conexao, $nome_comida, $tipo, $ingredientes, $modo_de_preparo, $tempo, $rendimento, $foto, $regiao, $perfil_idperfil); 
?>