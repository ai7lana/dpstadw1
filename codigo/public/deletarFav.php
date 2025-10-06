<?php
    require_once "../funcoes.php";
    require_once "../conexao.php";

    $id = $_GET['id'];

    if (deletarFavoritos($conexao, $conexao, $perfil_idperfil, $receita_idreceita)) {
        header("Location:listarFavoritos.php");
    }
    else {
        header("Location:erro.php");
    }

?>