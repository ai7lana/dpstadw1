<?php
    require_once "../conexao.php";
    require_once "../funcoes.php";

    $nome = "jfffose";
    $nome_perfil = "Flua";
    $email = "joffffao@gmail.com";
    $senha_hash = "123";

    salvarPerfil($conexao, $nome, $nome_perfil, $email, $senha_hash);

    
?>