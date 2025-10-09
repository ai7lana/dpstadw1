<?php


/**
 * salvar dados do usúario no perfil
 * 
 * A par.....
 * 
 * @param mysqli $conexao Uma conexão com o banco.
 * @param string $email O e-mail informado pelo usuário.
 * @param string $senha A senha informada pelo usuário.
 * @param string $nome o nome informado pelo usuario.
 * @param string $nome_perfil o nome de perfol informardo pelo usuario
 * @return bool perfil salvo
 * 
 **/
function salvarPerfil($conexao, $nome, $nome_perfil, $email, $senha) {
    $sql = "INSERT INTO perfil (nome, nome_perfil, email, senha) VALUES (?, ?, ?, ?)";
    $comando = mysqli_prepare($conexao, $sql);
    
    mysqli_stmt_bind_param($comando, 'ssss', $nome, $nome_perfil, $email, $senha);
    
    mysqli_stmt_execute($comando);
    mysqli_stmt_close($comando);

}

/**
 * salvar dados do da receita no perfil
 * 
 * A par.....
 * 
 * @param mysqli $conexao Uma conexão com o banco.
 * @param string $nome_comida o nome da comida informada pelo usuário.
 * @param string $tipo o tipo de comida informada pelo usuário.
 * @param string $ingredientes os ingredientes informados pelo usuario.
 * @param string $modo_de_preparo passo a passo da receita fornecido pelo usuario
 * @param string $tempo o tempo de preparo fornecido pelo usuario
 * @param string $rendimento o número de porções fornecido pelo usuario 
 * @param string $foto foto da receita fornecida pelo usuario
 * @return bool receita salva
 * 
 **/
function salvarReceita($conexao, $nome_comida, $tipo, $ingredientes, $modo_de_preparo, $tempo, $rendimento, $foto, $regiao, $perfil_idperfil) {
    $sql = "INSERT INTO receita (nome_comida, tipo, ingredientes, modo_de_preparo, tempo, rendimento, foto, regiao, perfil_idperfil) VALUES (?, ?, ?, ?, ?, ?, ?, ?, ?)";
    $comando = mysqli_prepare($conexao, $sql);

    mysqli_stmt_bind_param($comando, 'ssssssssi', $nome_comida, $tipo, $ingredientes, $modo_de_preparo, $tempo, $rendimento, $foto, $regiao, $perfil_idperfil);
    
    $funcionou = mysqli_stmt_execute($comando);
    mysqli_stmt_close($comando);
    
    return $funcionou;
}

/**
 * Salva uma avaliação de receita no banco de dados.
 *
 * @param mysqli $conexao A conexão com o banco de dados.
 * @param string $comentario O comentário feito pelo usuário.
 * @param int $nota A nota atribuída pelo usuário.
 * @param int $receita_idreceita O ID da receita que está sendo avaliada.
 * @param int $perfil_idperfil O ID do perfil do usuário que fez a avaliação.
 * @return bool Retorna true se a avaliação foi salva com sucesso, ou false em caso de erro.
 **/
function salvarAvaliacao ($conexao, $comentario, $nota, $receita_idreceita, $perfil_idperfil){
    $sql = "INSERT INTO avaliacao (comentario, nota, receita_idreceita, perfil_idperfil)
    VALUES (?, ?, ?, ?)";
    $comando = mysqli_prepare($conexao, $sql);

    mysqli_stmt_bind_param($comando, 'ssii', $comentario, $nota, $receita_idreceita, $perfil_idperfil);
    
    $funcionou = mysqli_stmt_execute($comando);
    mysqli_stmt_close($comando);
    return $funcionou;

}

/**
 * Salva um favorito para um perfil e receita.
 * 
 * @param mysqli $conexao A conexão com o banco de dados.
 * @param int $perfil_idperfil O ID do perfil.
 * @param int $receita_idreceita O ID da receita.
 * @return bool Retorna true se a operação for bem-sucedida, caso contrário, retorna false.
 **/

function salvarFavoritos($conexao, $perfil_idperfil, $receita_idreceita) {
    $sql = "INSERT INTO favoritos (perfil_idperfil, receita_idreceita) VALUES (?, ?)";
    $comando = mysqli_prepare($conexao, $sql);
    
    mysqli_stmt_bind_param($comando, 'ii', $perfil_idperfil, $receita_idreceita);
   
    $funcionou = mysqli_stmt_execute($comando);
    mysqli_stmt_close($comando);
    return $funcionou;

}
/**
 * Edita uma receita no banco de dados.
 * 
 * @param mysqli $conexao A conexão com o banco de dados.
 * @param string $nome_comida Nome da comida.
 * @param string $tipo Tipo da receita.
 * @param string $ingredientes Ingredientes da receita.
 * @param string $modo_de_preparo Modo de preparo da receita.
 * @param string $tempo Tempo de preparo.
 * @param string $rendimento Rendimento da receita.
 * @param string $foto URL da foto da receita.
 * @param string $regiao Região da receita.
 * @param int $perfil_idperfil ID do perfil associado à receita.
 * @param int $id ID da receita a ser editada.
 **/
function editarReceita ($conexao, $nome_comida, $tipo, $ingredientes, $modo_de_preparo, $tempo, $rendimento, 
    $foto, $regiao, $perfil_idperfil, $id){
    $sql = "UPDATE receita SET nome_comida=?, tipo=?, ingredientes=?, modo_de_preparo=?, tempo=?, rendimento=?, foto=?, regiao=?, perfil_idperfil=? WHERE idreceita = ? ";
    $comando = mysqli_prepare($conexao, $sql);
    
    mysqli_stmt_bind_param($comando, 'ssssssssii', $nome_comida, $tipo, $ingredientes, $modo_de_preparo, $tempo, $rendimento, $foto, $regiao, $perfil_idperfil, $id);
    
    mysqli_stmt_execute($comando);
    mysqli_stmt_close($comando);
}

/**
 * Edita o perfil do usuário no banco de dados.
 * 
 * @param mysqli $conexao A conexão com o banco de dados.
 * @param string $nome Nome do usuário.
 * @param string $nome_perfil Nome do perfil do usuário.
 * @param string $email E-mail do usuário.
 * @param string $senha A senha do usuário (será criptografada).
 * @param int $idperfil ID do perfil a ser editado.
 **/
function editarPerfil ($conexao, $nome, $nome_perfil, $email, $senha, $idperfil){
    $sql = "UPDATE perfil SET nome = ?, nome_perfil = ?, email = ?, senha = ? WHERE idperfil = ?";
    $comando = mysqli_prepare($conexao, $sql);

    $senha_hash = password_hash($senha, PASSWORD_DEFAULT);

    mysqli_stmt_bind_param($comando, 'ssssi', $nome, $nome_perfil, $email, $senha_hash, $idperfil);

    mysqli_stmt_execute($comando);
    mysqli_stmt_close($comando);

}

/**
 * Edita a avaliação de uma receita feita por um perfil.
 * 
 * @param mysqli $conexao A conexão com o banco de dados.
 * @param string $comentario O comentário da avaliação.
 * @param int $nota A nota atribuída (de 1 a 5).
 * @param int $perfil_idperfil O ID do perfil que fez a avaliação.
 * @param int $receita_idreceita O ID da receita avaliada.
 **/
function editarAvaliacao($conexao, $comentario, $nota, $perfil_idperfil, $receita_idreceita) {
    $sql = "UPDATE avaliacao SET comentario = ?, nota = ? WHERE perfil_idperfil = ? AND receita_idreceita = ?";
    $comando = mysqli_prepare($conexao, $sql);
    mysqli_stmt_bind_param($comando, 'ssii', $comentario, $nota, $perfil_idperfil, $receita_idreceita);

    mysqli_stmt_execute($comando);
    mysqli_stmt_close($comando);
}

/**
 * Edita um favorito (alterando perfil e receita).
 * 
 * @param mysqli $conexao A conexão com o banco de dados.
 * @param int $perfil_idperfil ID do perfil.
 * @param int $receita_idreceita ID da receita. 
 **/
function editarFavoritos($conexao, $perfil_idperfil, $receita_idreceita){
    $sql = "UPDATE favoritos SET perfil_idperfil = ?, receita_idreceita = ? WHERE perfil_idperfil = ? AND receita_idreceita = ?";
    $comando = mysqli_prepare($conexao, $sql);
    mysqli_stmt_bind_param($comando, 'ii', $perfil_idperfil, $receita_idreceita);

    mysqli_stmt_execute($comando);
    mysqli_stmt_close($comando);
}

/**
 * Deleta uma receita do banco de dados.
 * 
 * @param mysqli $conexao A conexão com o banco de dados.
 * @param int $idreceita O ID da receita a ser deletada.
 * @return bool Retorna true se a receita for deletada com sucesso, ou false caso contrário.
 **/
function deletarReceita ($conexao, $idreceita){
    $sql = "DELETE FROM receita WHERE idreceita = ?";
    $comando = mysqli_prepare($conexao, $sql);
    mysqli_stmt_bind_param($comando, 'i', $idreceita);
    
    $funcionou = mysqli_stmt_execute($comando);
    mysqli_stmt_close($comando);
    return $funcionou;
    
}

/**
 * Deleta o perfil do usuário do banco de dados.
 * 
 * @param mysqli $conexao A conexão com o banco de dados.
 * @param int $idperfil O ID do perfil a ser deletado.
 * @return bool Retorna true se o perfil for deletado com sucesso, ou false caso contrário.
 **/
function deletarPerfil ($conexao, $idperfil){
    $sql = "DELETE FROM perfil WHERE idperfil = ?";
    $comando = mysqli_prepare($conexao, $sql);
    mysqli_stmt_bind_param($comando, 'i', $idperfil);
    
    $funcionou = mysqli_stmt_execute($comando);
    mysqli_stmt_close($comando);
    return $funcionou;
}

/**
 * Deleta um favorito de um perfil e receita.
 * 
 * @param mysqli $conexao A conexão com o banco de dados.
 * @param int $perfil_idperfil O ID do perfil.
 * @param int $receita_idreceita O ID da receita.
 * @return bool Retorna true se o favorito for deletado com sucesso, ou false caso contrário.
 **/
function deletarFavoritos($conexao, $perfil_idperfil, $receita_idreceita) {
    $sql = "DELETE FROM favoritos WHERE perfil_idperfil = ? AND receita_idreceita = ?";
    $comando = mysqli_prepare($conexao, $sql);
    mysqli_stmt_bind_param($comando, 'ii', $perfil_idperfil, $receita_idreceita);

    $funcionou = mysqli_stmt_execute($comando);
    mysqli_stmt_close($comando);
    return $funcionou;
}


/**
 * Deleta uma avaliação de um perfil sobre uma receita.
 * 
 * @param mysqli $conexao A conexão com o banco de dados.
 * @param int $perfil_idperfil O ID do perfil.
 * @param int $receita_idreceita O ID da receita.
 * @return bool Retorna true se a avaliação for deletada com sucesso, ou false caso contrário.
 **/
function deletarAvaliacao($conexao, $perfil_idperfil, $receita_idreceita) {
    $sql = "DELETE FROM avaliacao WHERE perfil_idperfil = ? AND receita_idreceita = ?";
    $comando = mysqli_prepare($conexao, $sql);
    mysqli_stmt_bind_param($comando, 'ii', $perfil_idperfil, $receita_idreceita);
    
    $funcionou = mysqli_stmt_execute($comando);
    mysqli_stmt_close($comando);
    return $funcionou;
}

/**
 * Lista todas as receitas no banco de dados.
 * 
 * @param mysqli $conexao A conexão com o banco de dados.
 * @return array Retorna um array de todas as receitas.
 **/
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

/**
 * Lista todos os perfis cadastrados no banco de dados.
 * 
 * @param mysqli $conexao A conexão com o banco de dados.
 * @return array Retorna um array contendo todos os perfis encontrados na tabela "perfil".
 **/
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

/**
 * Lista todos os favoritos cadastrados no banco de dados.
 * 
 * @param mysqli $conexao A conexão com o banco de dados.
 * @return array Retorna um array contendo todos os favoritos encontrados na tabela "favoritos".
 **/
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
/**
 * Lista todas as avaliações cadastradas no banco de dados.
 * 
 * @param mysqli $conexao A conexão com o banco de dados.
 * @return array Retorna um array contendo todas as avaliações encontradas na tabela "avaliacao".
 **/
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

/**
 * Pesquisa uma receita pelo seu ID.
 * 
 * @param mysqli $conexao A conexão com o banco de dados.
 * @param int $idreceita O ID da receita a ser pesquisada.
 * @return array|false Retorna um array com os dados da receita, ou false caso não encontre a receita.
 **/
function pesquisarReceitaId($conexao, $idreceita) {
    $sql = "SELECT * FROM receita WHERE idreceita = ?";
    $comando = mysqli_prepare($conexao, $sql);
    // $idreceita = "%" . $idreceita . "%";
    $idreceita = $idreceita;
    mysqli_stmt_bind_param($comando, 'i', $idreceita);

    mysqli_stmt_execute($comando);
    $resultado = mysqli_stmt_get_result($comando);
    $receita = mysqli_fetch_assoc($resultado);
    
    mysqli_stmt_close($comando);
    return $receita;
}

/**
 * Pesquisa um perfil pelo seu ID.
 * 
 * @param mysqli $conexao A conexão com o banco de dados.
 * @param int $idperfil O ID do perfil a ser pesquisado.
 * @return array|false Retorna um array com os dados do perfil, ou false caso não encontre o perfil.
 **/
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

/**
 * Pesquisa uma avaliação pelo ID do perfil e ID da receita.
 * 
 * @param mysqli $conexao A conexão com o banco de dados.
 * @param int $perfil_idperfil O ID do perfil (usuário).
 * @param int $receita_idreceita O ID da receita.
 * @return array|false Retorna um array com os dados da avaliação, ou false caso não encontre a avaliação.
 **/
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


/**
 * Pesquisa uma receita pelo nome.
 * 
 * @param mysqli $conexao A conexão com o banco de dados.
 * @param string $nome_comida O nome da comida/receita a ser pesquisada.
 * @return array|false Retorna um array com os dados da receita, ou false caso não encontre a receita.
 **/
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

/**
 * Pesquisa um perfil pelo nome.
 * 
 * @param mysqli $conexao A conexão com o banco de dados.
 * @param string $nome O nome do perfil a ser pesquisado.
 * @return array|false Retorna um array com os dados do perfil, ou false caso não encontre o perfil.
 **/
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

/**
 * Pesquisa se um perfil tem uma receita em seus favoritos.
 * 
 * @param mysqli $conexao A conexão com o banco de dados.
 * @param int $perfil_idperfil O ID do perfil.
 * @param int $receita_idreceita O ID da receita.
 * @return array|false Retorna um array com os dados dos favoritos, ou false caso não encontre.
 **/
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

/**
 * Pesquisa todas as receitas associadas a um perfil.
 * 
 * @param mysqli $conexao A conexão com o banco de dados.
 * @param int $perfil_idperfil O ID do perfil.
 * @return array|false Retorna um array com as receitas associadas ao perfil, ou false caso não encontre nenhuma.
 **/
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

/**
 * Pesquisa receitas por região.
 * 
 * @param mysqli $conexao A conexão com o banco de dados.
 * @param string $regiao O nome da região a ser pesquisada.
 * @return array|false Retorna um array com os dados da receita, ou false caso não encontre nenhuma receita.
 **/
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

/**
 * Pesquisa receitas por tipo.
 * 
 * @param mysqli $conexao A conexão com o banco de dados.
 * @param string $tipo O tipo de receita a ser pesquisado.
 * @return array|false Retorna um array com os dados da receita, ou false caso não encontre nenhuma receita.
 **/
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

/**
 * Pesquisa receitas por comentário.
 * 
 * @param mysqli $conexao A conexão com o banco de dados.
 * @param string $comentario O comentário a ser pesquisado.
 * @return array|false Retorna um array com os dados da receita, ou false caso não encontre nenhuma receita.
 **/
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

/**
 * Pesquisa receitas pelos ingredientes.
 * 
 * @param mysqli $conexao A conexão com o banco de dados.
 * @param string $ingredientes O nome dos ingredientes a serem pesquisados.
 * @return array|false Retorna um array com os dados da receita, ou false caso não encontre nenhuma receita.
 **/
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

/**
 * Pesquisa um perfil pelo nome do perfil.
 * 
 * @param mysqli $conexao A conexão com o banco de dados.
 * @param string $nome_perfil O nome do perfil a ser pesquisado.
 * @return array|false Retorna um array com os dados do perfil, ou false caso não encontre o perfil.
 **/
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
