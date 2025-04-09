<?php
function salvarUsuario($conexao, $email, $senha) {
    $sql = "INSERT INTO usuario (email, senha) VALUES (?, ?)";
    $comando = mysqli_prepare($conexao, $sql);
    
    $senha_hash = password_hash($senha, PASSWORD_DEFAULT);

    mysqli_stmt_bind_param($comando, 'ss', $email, $senha_hash);
    
    $funcionou = mysqli_stmt_execute($comando);
    mysqli_stmt_close($comando);
    
    return $funcionou;
};


?>