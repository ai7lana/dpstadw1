<?php
require_once "../conexao.php";
require_once "../funcoes.php";

$nome_comida = "Lasanha";
$tipo = "Jantar";
$ingredientes = "Massa, queijo, molho de tomate";
$modo_de_preparo = "Refogue cebola e alho no azeite. Adicione carne moída e cozinhe até dourar. 
Tempere com sal, pimenta, orégano e noz-moscada. Junte extrato de tomate e tomates pelados. 
Cozinhe 30 min em fogo baixo. Para o molho branco, derreta manteiga, adicione farinha, mexa e adicione leite aos poucos até engrossar. Tempere. 
Em um refratário, alterne camadas de bolonhesa, massa, molho branco e queijo. Asse a 180°C por 30 min com papel-alumínio.";
$tempo = "1h";
$rendimento = "6 porções";
$foto = "lasanha.jpg";
$regiao = "Sudeste";
$usuario_idusuario = 1;

salvarReceita($conexao, $nome_comida, $tipo, $ingredientes, $modo_de_preparo, $tempo, $rendimento, $foto, $regiao, $usuario_idusuario); 
?>