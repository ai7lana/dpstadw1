<?php
    require_once "../funcoes.php";
    require_once "../conexao.php";

    $id = $_GET['id'];

    if (deletarAvaliacao($conexao, $conexao, $perfil_idperfil, $receita_idreceita)) {
        header("Location:listarComentario.php");
    }
    else {
        header("Location:erro.php");
    }

?>