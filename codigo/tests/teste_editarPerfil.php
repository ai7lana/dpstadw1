<?php

require_once "../conexao.php";
require_once "../funcoes.php";

$nome = "asiuud";
$nome_perfil = "apoll0";
$senha = "555";
$email = "alalçalalal@gmail.com";
$id = 2;

editarPerfil($conexao, $nome, $nome_perfil, $email, $senha, $id);

echo "<pre>";
print_r(listarPerfil($conexao));
echo "</pre>";
?>