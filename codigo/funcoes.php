<?php

function salvarPerfil ($conexao, $nome, $nome_perfil, $usuario_idusario,  $email, $senha) {
    $sql = "INSERT INTO perfil (nome, nome_perfil, usuario_idusuario, email, senha) VALUES (?, ?, ?, ?, ?)";
    $comando = mysqli_prepare($conexao, $sql);
    
    mysqli_stmt_bind_param($comando, 'sssss', $nome, $nome_perfil, $usuario_idusario, $email, $senha);
    
    mysqli_stmt_execute($comando);
    mysqli_stmt_close($comando);

}

function salvarReceita($conexao, $nome_comida, $tipo, $ingredientes, $modo_de_preparo, $tempo, $rendimento, $foto, $regiao, $usuario_idusuario) {
    $sql = "INSERT INTO receita (nome_comida, tipo, ingredientes, modo_de_preparo, tempo, rendimento, foto, regiao, usuario_idusuario) 
            VALUES (?, ?, ?, ?, ?, ?, ?, ?, ?)";
    $comando = mysqli_prepare($conexao, $sql);

    mysqli_stmt_bind_param($comando, 'sssssssss', $nome_comida, $tipo, $ingredientes, $modo_de_preparo, $tempo, $rendimento, $foto, $regiao, $usuario_idusuario);

    mysqli_stmt_execute($comando);
    mysqli_stmt_close($comando);
}

function salvarAvaliacao ($conexao, $comentario, $nota, $receita_idreceita, $perfil_idperfil){
    $sql = "INSERT INTO avaliacao (comentario, nota, receita_idreceita, perfil_idperfil)
    VALUES (?, ?, ?, ?)";
    $comando = mysqli_prepare($conexao, $sql);

    mysqli_stmt_bind_param($comando, 'ssii', $comentario, $nota, $receita_idreceita, $perfil_idperfil);
    
    mysqli_stmt_execute($comando);
    mysqli_stmt_close($comando);

}

function salvarFavoritos($conexao, $perfil_idperfil, $receita_idreceita) {
    $sql = "INSERT INTO favoritos (perfil_idperfil, receita_idreceita) VALUES (?, ?)";
    $comando = mysqli_prepare($conexao, $sql);
    
    mysqli_stmt_bind_param($comando, 'ii', $perfil_idperfil, $receita_idreceita);
   
    mysqli_stmt_execute($comando);
    mysqli_stmt_close($comando);
}

function editarReceita ($conexao, $nome_comida, $tipo, $ingredientes, $modo_de_preparo, $tempo, $rendimento, 
    $foto, $regiao, $usuario_idusuario){
    $sql = "UPDATE tb_receita SET nome_comida=?, tipo=?, indredientes=?
    modo_de_preparo=?, tempo=?, rendimento=?, foto=?, regiao=?, perfil_idperfil WHERE idcliente=?";
    $comando = mysqli_prepare($conexao, $sql);
    mysqli_stmt_bind_param($comando, 'sssssssss', $nome_comida, $tipo, $ingredientes, $modo_de_preparo, 
    $tempo, $rendimento, $foto, $regiao, $usuario_idusuario);
    
    mysqli_stmt_execute($comando);
    mysqli_stmt_close($comando);
}

function editarPerfil ($conexao, $nome, $nome_perfil,  $email, $senha){
    $sql = "UPDATE perfil SET nome = ?, nome_perfil = ?, email = ?, senha = ? WHERE idusuario = ?";
    $comando = mysqli_prepare($conexao, $sql);

    $senha_hash = password_hash($senha, PASSWORD_DEFAULT);

    mysqli_stmt_bind_param($comando, 'ssssi', $nome, $nome_perfil, $email, $senha_hash, $usuario_idusuario);

    mysqli_stmt_execute($comando);
    mysqli_stmt_close($comando);

}

function deletarReceita (){

}

function deletarPerfil (){

}


?>
