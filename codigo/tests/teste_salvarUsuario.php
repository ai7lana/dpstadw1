<?php
    require_once "../conexao.php";
    require_once "../funcoes.php";

    $email = "joao@gmail.com";
    $senha_hash = "123";

    salvarUsuario($conexao, $email, $senha_hash);

    
?>