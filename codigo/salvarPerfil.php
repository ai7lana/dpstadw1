<?php

require_once "conexao.php";
require_once "funcoes.php";

$nome = $_POST['nome'];
$email = $_POST['email'];
$senha = $_POST['senha'];
$nome_perfil = $_POST['nome_perfil'];

salvarPerfil($conexao, $nome, $email, $senha, $nome_perfil);

header("Location: /public/formPerfil.php");
?>