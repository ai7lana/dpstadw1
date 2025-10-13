<?php
    require_once "../funcoes.php";
    require_once "../conexao.php";

    $perfil_idperfil = $_GET['id'];
    $receita_idreceita = $_GET['id'];

    if (deletarAvaliacao($conexao, $perfil_idperfil, $receita_idreceita)) {
        header("Location:listarComentario.php");
    }
    else {
        header("Location:erro.php");
    }

?>