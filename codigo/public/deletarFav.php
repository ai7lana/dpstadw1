<?php
    require_once "../funcoes.php";
    require_once "../conexao.php";

    $perfil_idperfil = $_GET['id'];
    $receita_idreceita = $_GET['id'];

    if (deletarFavoritos($conexao, $perfil_idperfil, $receita_idreceita)) {
        header("Location:listarFavoritos.php");
    }
    else {
        header("Location:erro.php");
    }

?>