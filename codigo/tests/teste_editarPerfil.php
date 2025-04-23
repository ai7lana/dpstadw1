<?php

require_once "../conexao.php";
require_once "../funcoes.php";

$idperfil = 1;
$nome = "nama";
$nome_perfil = "namasama";
$senha = "123";
$email = "namasama@gmail.com";

editarPerfil($conexao, $nome, $nome_perfil,  $email, $senha);

echo "<pre>";
print_r(listarPerfil($conexao));
echo "</pre>";
?>