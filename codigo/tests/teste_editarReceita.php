<?php

require_once "../conexao.php";
require_once "../funcoes.php";

$idreceita = 1;
$nome_comida = "fuba";
$tipo = "bolo";
$ingredientes = "sdfghjkgtfdsfghjdf ghjkfdsfghjk dfghjkjfghjkl dgfghjhgfdfjklkjhgfdsfghjkllkjh";
$modo_de_preparo = "dfghjkljhgfdsdfghjklkj hgfdsdfghjklkjhgfdsfgh jklkjhgfdsfghjk";
$tempo = "30 minutos";
$rendimento = "5 pessoas";
$foto = "diahshd.jpeg";
$regiao = "nordeste";
$perfil_idperfil = 1 ;
editarPerfil($conexao, $nome_comida; $tipo, $ingredientes, $modo_de_preparo, $tempo, $rendimento, $foto, $regiao, $perfil_idperfil);

echo "<pre>";
print_r(listarReceita($conexao));
echo "</pre>";
?>