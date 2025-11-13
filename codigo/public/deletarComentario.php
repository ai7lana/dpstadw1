<?php
require_once "../funcoes.php";
require_once "../conexao.php";

// Pegando os dois parâmetros da URL
$perfil_idperfil = isset($_GET['perfil']) ? intval($_GET['perfil']) : null;
$receita_idreceita = isset($_GET['receita']) ? intval($_GET['receita']) : null;

if ($perfil_idperfil && $receita_idreceita) {
    if (deletarAvaliacao($conexao, $perfil_idperfil, $receita_idreceita)) {
        header("Location: listarComentario.php");
        exit;
    } else {
        header("Location: erro.php?msg=erro_ao_deletar");
        exit;
    }
} else {
    header("Location: erro.php?msg=parametros_invalidos");
    exit;
}
?>
