<?php

require_once "conexao.php";
require_once "funcoes.php";

$nome = $_POST['nome'];
$email = $_POST['email'];
$senha = $_POST['senha'];
$nome_perfil = $_POST['nome_perfil'];

if ($id == 0) {
    salvarPerfil($conexao, $nome, $nome_perfil, $email, $senha);
} else {
    editarPerfil($conexao, $nome, $nome_perfil, $email, $senha, $idperfil);
}


header("Location: /public/formPerfil.php");
?>