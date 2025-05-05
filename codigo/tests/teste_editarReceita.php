<?php

require_once "../conexao.php";
require_once "../funcoes.php";

$id = 1;
$nome_comida = "bolo";
$tipo = "bolo";
$ingredientes = "sem nda jh";
$modo_de_preparo = "cozzinhe bastantes";
$tempo = "30m";
$rendimento = "5 pessoas";
$foto = "diahshd.jpeg";
$regiao = "nordeste";
$perfil_idperfil = 1 ;

editarReceita($conexao, $nome_comida, $tipo, $ingredientes, $modo_de_preparo, $tempo, $rendimento, $foto, $regiao, $perfil_idperfil, $id);

echo "<pre>";
print_r(listarReceitas($conexao));
echo "</pre>";
?>