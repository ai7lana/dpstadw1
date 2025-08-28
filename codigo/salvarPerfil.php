<?php

require_once "conexao.php";

$nome = $_POST['nome'];
$email = $_POST['email'];
$senha = $_POST['senha'];
$nome_perfil = $_POST['nome_perfil'];

$senha_hash = password_hash($senha, PASSWORD_DEFAULT);

$sql = "INSERT INTO perfil (nome, email, senha, nome_perfil) VALUES ('$nome', '$email', '$senha_hash', '$nome_perfil')";

mysqli_query($conexao, $sql);

header("Location: /public/formPerfil.php");
?>