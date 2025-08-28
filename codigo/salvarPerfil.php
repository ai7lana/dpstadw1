<?php

require_once "conexao.php";
require_once "funcoes.php";

$nome = $_POST['nome'];
$email = $_POST['email'];
$senha = $_POST['senha'];
$nome_perfil = $_POST['nome_perfil'];

if ($id == 0) {
    salvarPerfil($conexao, $nome, $email, $senha, $nome_perfil);
} else {
    editarPerfil($conexao, $nome, $email, $senha, $nome_perfil, $id_perfil);
}

header("Location: /public/formPerfil.php");
?>