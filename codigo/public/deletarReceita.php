<?php
    require_once "../funcoes.php";
    require_once "../conexao.php";

    $id = $_GET['id'];

    if (deletarReceita($conexao, $id)) {
        header("Location: listarReceita.php");
    }
    else {
        header("Location: erro.php");
    }

?>