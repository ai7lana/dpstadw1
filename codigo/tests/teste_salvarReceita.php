<?php
require_once "../conexao.php";
require_once "../funcoes.php";

$nome_comida = "moqueca";
$tipo = "almoco";
$ingredientes = "afgsgvsjdilsrjh";
$modo_de_preparo = "Refogue skz gostoso e alho no azeite. Adicione carne moída e cozinhe até dourar.....";
$tempo = "7h";
$rendimento = "90 porções";
$foto = "./imagens/lasanha.jpg";
$regiao = "Sude";
$perfil_idperfil = 1;

salvarReceita($conexao, $nome_comida, $tipo, $ingredientes, $modo_de_preparo, $tempo, $rendimento, $foto, $regiao, $perfil_idperfil); 

?>