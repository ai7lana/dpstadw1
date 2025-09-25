<?php
    require_once "../funcoes.php";
    require_once "../conexao.php";

    $id = $_GET['id'];

    if (deletarPerfil($conexao, $id)) {
        header("Location:listarPerfil.php");
    }
    else {
        header("Location:erro.php");
    }

?>