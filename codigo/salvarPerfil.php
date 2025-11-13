<?php

require_once "conexao.php";
require_once "funcoes.php";

$nome = $_POST['nome'];
$email = $_POST['email'];
$senha = $_POST['senha'];
$nome_perfil = $_POST['nome_perfil'];

$id = isset($_POST['id']) ? $_POST['id'] : 0;

$senha_hash = password_hash($senha, PASSWORD_DEFAULT);

if ($id == 0) {
    salvarPerfil($conexao, $nome, $nome_perfil, $email, $senha_hash);
    $sql = "INSERT INTO tb_usuario (nome, email, senha, tipo) VALUES ('$nome', '$email', '$senha_hash', 'c')";
} else {
    editarPerfil($conexao, $nome, $nome_perfil, $email, $senha_hash, $id);
}

header("Location: /public/todoPerfil.php");
?>