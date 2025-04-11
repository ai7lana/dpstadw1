<?php
    require_once "../conexao.php";
    require_once "../funcoes.php";

    $nome = "jose";
    $nome_perfil = "Fjose";
    $usuario_idusuario = "1";
    $email = "joao@gmail.com";
    $senha_hash = "123";

    salvarPerfil($conexao, $nome, $nome_perfil, $usuario_idusuario, $email, $senha_hash);

    
?>