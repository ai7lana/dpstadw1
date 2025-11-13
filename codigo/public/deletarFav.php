<?php
require_once "../funcoes.php";
require_once "../conexao.php";

// Pegando os dois parâmetros da URL
$perfil_idperfil = isset($_GET['perfil']) ? $_GET['perfil'] : null;
$receita_idreceita = isset($_GET['receita']) ? $_GET['receita'] : null;

if ($perfil_idperfil && $receita_idreceita) {
    if (deletarFavoritos($conexao, $perfil_idperfil, $receita_idreceita)) {
        header("Location: listarFavoritos.php");
        exit;
    } else {
        header("Location: erro.php");
        exit;
    }
} else {
    // Caso faltem parâmetros
    header("Location: erro.php?msg=parametros_invalidos");
    exit;
}
?>
