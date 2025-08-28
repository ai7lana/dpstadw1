<?php

function salvarPerfil($conexao, $nome, $nome_perfil, $email, $senha) {
    $sql = "INSERT INTO perfil (nome, nome_perfil, email, senha) VALUES (?, ?, ?, ?)";
    $comando = mysqli_prepare($conexao, $sql);
    
    mysqli_stmt_bind_param($comando, 'ssss', $nome, $nome_perfil, $email, $senha);
    
    mysqli_stmt_execute($comando);
    mysqli_stmt_close($comando);

}

function salvarReceita($conexao, $nome_comida, $tipo, $ingredientes, $modo_de_preparo, $tempo, $rendimento, $foto, $regiao, $perfil_idperfil) {
    $sql = "INSERT INTO receita (nome_comida, tipo, ingredientes, modo_de_preparo, tempo, rendimento, foto, regiao, perfil_idperfil) VALUES (?, ?, ?, ?, ?, ?, ?, ?, ?)";
    $comando = mysqli_prepare($conexao, $sql);

    mysqli_stmt_bind_param($comando, 'ssssssssi', $nome_comida, $tipo, $ingredientes, $modo_de_preparo, $tempo, $rendimento, $foto, $regiao, $perfil_idperfil);
    
    $funcionou = mysqli_stmt_execute($comando);
    mysqli_stmt_close($comando);
    
    return $funcionou;
}

function salvarAvaliacao ($conexao, $comentario, $nota, $receita_idreceita, $perfil_idperfil){
    $sql = "INSERT INTO avaliacao (comentario, nota, receita_idreceita, perfil_idperfil)
    VALUES (?, ?, ?, ?)";
    $comando = mysqli_prepare($conexao, $sql);

    mysqli_stmt_bind_param($comando, 'ssii', $comentario, $nota, $receita_idreceita, $perfil_idperfil);
    
    $funcionou = mysqli_stmt_execute($comando);
    mysqli_stmt_close($comando);
    return $funcionou;

}

function salvarFavoritos($conexao, $perfil_idperfil, $receita_idreceita) {
    $sql = "INSERT INTO favoritos (perfil_idperfil, receita_idreceita) VALUES (?, ?)";
    $comando = mysqli_prepare($conexao, $sql);
    
    mysqli_stmt_bind_param($comando, 'ii', $perfil_idperfil, $receita_idreceita);
   
    $funcionou = mysqli_stmt_execute($comando);
    mysqli_stmt_close($comando);
    return $funcionou;

}

function editarReceita ($conexao, $nome_comida, $tipo, $ingredientes, $modo_de_preparo, $tempo, $rendimento, 
    $foto, $regiao, $perfil_idperfil, $id){
    $sql = "UPDATE receita SET nome_comida=?, tipo=?, ingredientes=?, modo_de_preparo=?, tempo=?, rendimento=?, foto=?, regiao=?, perfil_idperfil=? WHERE idreceita = ? ";
    $comando = mysqli_prepare($conexao, $sql);
    
    mysqli_stmt_bind_param($comando, 'ssssssssii', $nome_comida, $tipo, $ingredientes, $modo_de_preparo, $tempo, $rendimento, $foto, $regiao, $perfil_idperfil, $id);
    
    mysqli_stmt_execute($comando);
    mysqli_stmt_close($comando);
}

function editarPerfil ($conexao, $nome, $nome_perfil, $email, $senha, $idperfil){
    $sql = "UPDATE perfil SET nome = ?, nome_perfil = ?, email = ?, senha = ? WHERE idperfil = ?";
    $comando = mysqli_prepare($conexao, $sql);

    $senha_hash = password_hash($senha, PASSWORD_DEFAULT);

    mysqli_stmt_bind_param($comando, 'ssssi', $nome, $nome_perfil, $email, $senha_hash, $idperfil);

    mysqli_stmt_execute($comando);
    mysqli_stmt_close($comando);

}

function editarAvaliacao($conexao, $comentario, $nota, $perfil_idperfil, $receita_idreceita) {
    $sql = "UPDATE avaliacao SET comentario = ?, nota = ? WHERE perfil_idperfil = ? AND receita_idreceita = ?";
    $comando = mysqli_prepare($conexao, $sql);
    mysqli_stmt_bind_param($comando, 'ssii', $comentario, $nota, $perfil_idperfil, $receita_idreceita);

    mysqli_stmt_execute($comando);
    mysqli_stmt_close($comando);
}

function editarFavoritos($conexao, $perfil_idperfil, $receita_idreceita){
    $sql = "UPDATE favoritos SET perfil_idperfil = ?, receita_idreceita = ? WHERE perfil_idperfil = ? AND receita_idreceita = ?";
    $comando = mysqli_prepare($conexao, $sql);
    mysqli_stmt_bind_param($comando, 'ii', $perfil_idperfil, $receita_idreceita);

    mysqli_stmt_execute($comando);
    mysqli_stmt_close($comando);
}

function deletarReceita ($conexao, $idreceita){
    $sql = "DELETE FROM receita WHERE idreceita = ?";
    $comando = mysqli_prepare($conexao, $sql);
    mysqli_stmt_bind_param($comando, 'i', $idreceita);
    
    $funcionou = mysqli_stmt_execute($comando);
    mysqli_stmt_close($comando);
    return $funcionou;
    
}

function deletarPerfil ($conexao, $idperfil){
    $sql = "DELETE FROM perfil WHERE idperfil = ?";
    $comando = mysqli_prepare($conexao, $sql);
    mysqli_stmt_bind_param($comando, 'i', $idperfil);
    
    $funcionou = mysqli_stmt_execute($comando);
    mysqli_stmt_close($comando);
    return $funcionou;

}

function deletarFavoritos($conexao, $perfil_idperfil, $receita_idreceita) {
    $sql = "DELETE FROM favoritos WHERE perfil_idperfil = ? AND receita_idreceita = ?";
    $comando = mysqli_prepare($conexao, $sql);
    mysqli_stmt_bind_param($comando, 'ii', $perfil_idperfil, $receita_idreceita);

    $funcionou = mysqli_stmt_execute($comando);
    mysqli_stmt_close($comando);
    return $funcionou;
}

function deletarAvaliacao($conexao, $perfil_idperfil, $receita_idreceita) {
    $sql = "DELETE FROM avaliacao WHERE perfil_idperfil = ? AND receita_idreceita = ?";
    $comando = mysqli_prepare($conexao, $sql);
    mysqli_stmt_bind_param($comando, 'ii', $perfil_idperfil, $receita_idreceita);
    
    $funcionou = mysqli_stmt_execute($comando);
    mysqli_stmt_close($comando);
    return $funcionou;
}

function listarReceitas($conexao) {
    $sql = "SELECT * FROM receita";
    $comando = mysqli_prepare($conexao, $sql);

    mysqli_stmt_execute($comando);
    $resultados = mysqli_stmt_get_result($comando);

    $lista_receitas = [];
    while ($receita = mysqli_fetch_assoc($resultados)) {
        $lista_receitas[] = $receita;
    }
    mysqli_stmt_close($comando);

    return $lista_receitas;
}

function listarPerfil ($conexao){
    $sql = "SELECT * FROM perfil";
    $comando = mysqli_prepare($conexao, $sql);

    mysqli_stmt_execute($comando);
    $resultados = mysqli_stmt_get_result($comando);

    $lista_perfil = [];
    while ($perfil = mysqli_fetch_assoc($resultados)) {
        $lista_perfil[] = $perfil;
    }
    mysqli_stmt_close($comando);

    return $lista_perfil;

}

function listarFavorito ($conexao){
    $sql = "SELECT * FROM favoritos";
    $comando = mysqli_prepare($conexao, $sql);

    mysqli_stmt_execute($comando);
    $resultados = mysqli_stmt_get_result($comando);

    $lista_favorito = [];
    while ($favorito = mysqli_fetch_assoc($resultados)) {
        $lista_favorito[] = $favorito;
    }
    mysqli_stmt_close($comando);

    return $lista_favorito;

}

function listarAvaliacao ($conexao){
    $sql = "SELECT * FROM avaliacao";
    $comando = mysqli_prepare($conexao, $sql);

    mysqli_stmt_execute($comando);
    $resultados = mysqli_stmt_get_result($comando);

    $lista_avaliacao = [];
    while ($avaliacao = mysqli_fetch_assoc($resultados)) {
        $lista_avaliacao[] = $avaliacao;
    }
    mysqli_stmt_close($comando);
    return $lista_avaliacao;
}

function pesquisarReceitaId($conexao, $idreceita) {
    $sql = "SELECT * FROM receita WHERE idreceita = ?";
    $comando = mysqli_prepare($conexao, $sql);
    $idreceita = "%" . $idreceita . "%";
    mysqli_stmt_bind_param($comando, 'i', $idreceita);

    mysqli_stmt_execute($comando);
    $resultado = mysqli_stmt_get_result($comando);
    $receita = mysqli_fetch_assoc($resultado);
    
    mysqli_stmt_close($comando);
    return $receita;
}

function pesquisarPerfilId($conexao, $idperfil) {
    $sql = "SELECT * FROM perfil WHERE idperfil = ?";
    $comando = mysqli_prepare($conexao, $sql);
    $idperfil = "%" . $idperfil . "%";
    mysqli_stmt_bind_param($comando, 'i', $idperfil);

    mysqli_stmt_execute($comando);
    $resultado = mysqli_stmt_get_result($comando);
    $perfil = mysqli_fetch_assoc($resultado);
    
    mysqli_stmt_close($comando);
    return $perfil;
}

function pesquisarAvaliacaoId($conexao, $perfil_idperfil, $receita_idreceita){
    $sql = "SELECT * FROM avaliacao WHERE perfil_idperfil = ? and receita_idreceita = ?";
    $comando = mysqli_prepare($conexao, $sql);
    $perfil_idperfil = "%" . $perfil_idperfil . "%";
    $receita_idreceita = "%" . $receita_idreceita . "%";
    mysqli_stmt_bind_param($comando, 'ii', $perfil_idperfil, $receita_idreceita);

    mysqli_stmt_execute($comando);
    $resultado = mysqli_stmt_get_result($comando);
    $avaliacao = mysqli_fetch_assoc($resultado);
    
    mysqli_stmt_close($comando);
    return $avaliacao;
}


function pesquisarReceitaNome($conexao, $nome_comida) {
    $sql = "SELECT * FROM receita WHERE nome_comida LIKE ?";
    $comando = mysqli_prepare($conexao, $sql);
    $nome_comida = "%" . $nome_comida . "%";
    mysqli_stmt_bind_param($comando, 's', $nome_comida);

    mysqli_stmt_execute($comando);
    $resultado = mysqli_stmt_get_result($comando);
    $receita = mysqli_fetch_assoc($resultado);
    
    mysqli_stmt_close($comando);
    return $receita;

    
}

function pesquisarPerfilNome($conexao, $nome) {
    $sql = "SELECT * FROM perfil WHERE nome LIKE ?";
    $comando = mysqli_prepare($conexao, $sql);
    $nome = "%" . $nome . "%";
    mysqli_stmt_bind_param($comando, 's', $nome);

    mysqli_stmt_execute($comando);
    $resultado = mysqli_stmt_get_result($comando);
    $perfil = mysqli_fetch_assoc($resultado);
    
    mysqli_stmt_close($comando);
    return $perfil;

}

function pesquisarFavoritosId($conexao, $perfil_idperfil, $receita_idreceita) {
    $sql = "SELECT * FROM favoritos WHERE perfil_idperfil = ? AND receita_idreceita = ?";
    $comando = mysqli_prepare($conexao, $sql);
    $perfil_idperfil = "%" . $perfil_idperfil . "%";
    $receita_idreceita = "%" . $receita_idreceita . "%";
    mysqli_stmt_bind_param($comando, 'ii', $perfil_idperfil, $receita_idreceita);

    mysqli_stmt_execute($comando);
    $resultado = mysqli_stmt_get_result($comando);
    $favoritos = mysqli_fetch_assoc($resultado);
    
    mysqli_stmt_close($comando);
    return $favoritos;

}

function pesquisarReceitaPerfil($conexao, $perfil_idperfil){
    $sql = "SELECT * FROM receita WHERE perfil_idperfil = ?";
    $comando = mysqli_prepare($conexao, $sql);
    $nomperfil_idperfile = "%" . $perfil_idperfil . "%";

    mysqli_stmt_bind_param($comando, 'i', $perfil_idperfil);

    mysqli_stmt_execute($comando);
    $resultado = mysqli_stmt_get_result($comando);
    $perfil = mysqli_fetch_assoc($resultado);
    
    mysqli_stmt_close($comando);
    return $perfil;

}

function pesquisarReceitaRegiao($conexao, $regiao){
    $sql = "SELECT * FROM receita WHERE regiao LIKE ?";
    $comando = mysqli_prepare($conexao, $sql);
    $regiao = "%" . $regiao . "%";

    mysqli_stmt_bind_param($comando, 's', $regiao);

    mysqli_stmt_execute($comando);
    $resultado = mysqli_stmt_get_result($comando);
    $receita = mysqli_fetch_assoc($resultado);
    
    mysqli_stmt_close($comando);
    return $receita;
}

function pesquisarReceitaTipo($conexao, $tipo){
    $sql = "SELECT * FROM receita WHERE tipo LIKE ?";
    $comando = mysqli_prepare($conexao, $sql);
    $tipo = "%" . $tipo . "%";

    mysqli_stmt_bind_param($comando, 's', $tipo);

    mysqli_stmt_execute($comando);
    $resultado = mysqli_stmt_get_result($comando);
    $receita = mysqli_fetch_assoc($resultado);
    
    mysqli_stmt_close($comando);
    return $receita;
}

function pesquisarReceitaComentario($conexao, $comentario){
    $sql = "SELECT * FROM comentario LIKE ?";
    $comando = mysqli_prepare($conexao, $sql);
    $comentario = "%" . $comentario . "%";

    mysqli_stmt_bind_param($comando, 's', $comentario);

    mysqli_stmt_execute($comando);
    $resultado = mysqli_stmt_get_result($comando);
    $receita = mysqli_fetch_assoc($resultado);
    
    mysqli_stmt_close($comando);
    return $receita;
}

function pesquiarReceitaIngredientes($conexao, $ingredientes){
    $sql = "SELECT * FROM receita WHERE ingredientes LIKE ?";
    $comando = mysqli_prepare($conexao, $sql);
    $ingredientes = "%" . $ingredientes . "%";

    mysqli_stmt_bind_param($comando, 's', $ingredientes);

    mysqli_stmt_execute($comando);
    $resultado = mysqli_stmt_get_result($comando);
    $receita = mysqli_fetch_assoc($resultado);
    
    mysqli_stmt_close($comando);
    return $receita;
}

function pesquisarPerfilNomePerfil($conexao, $nome_perfil){
    $sql = "SELECT * FROM perfil WHERE nome_perfil LIKE ?";
    $comando = mysqli_prepare($conexao, $sql);
    $nome_perfil = "%" . $nome_perfil . "%";

    mysqli_stmt_bind_param($comando, 's', $nome_perfil);

    mysqli_stmt_execute($comando);
    $resultado = mysqli_stmt_get_result($comando);
    $perfil = mysqli_fetch_assoc($resultado);
    
    mysqli_stmt_close($comando);
    return $perfil;
}

?>
