<?php

require_once "../conexao.php";
require_once "../funcoes.php";

$nome = "ahhh";
$nome_perfil = "apoll0";
$senha = "133";
$email = "alangdrha@gmail.com";
$id = 3;

editarPerfil($conexao, $nome, $nome_perfil, $email, $senha, $id);

echo "<pre>";
print_r(listarPerfil($conexao));
echo "</pre>";
?>