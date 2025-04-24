<?php

require_once "../conexao.php";
require_once "../funcoes.php";

$nome = "nari";
$nome_perfil = "nama";
$senha = "123";
$email = "namasfffama@gmail.com";
$idperfil = 2;

editarPerfil($conexao, $nome, $nome_perfil, $email, $senha, $idperfil);

echo "<pre>";
print_r(listarPerfil($conexao));
echo "</pre>";
?>