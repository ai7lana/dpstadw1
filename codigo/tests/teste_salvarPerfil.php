<?php
    require_once "../conexao.php";
    require_once "../funcoes.php";

    $nome = "isisisi";
    $nome_perfil = "dd";
    $email = "alana@gmail.com";
    $senha_hash = "135";

    salvarPerfil($conexao, $nome, $nome_perfil, $email, $senha_hash);

    
?>