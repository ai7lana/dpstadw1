<?php

require_once "conexao.php";
require_once "funcoes.php";

$perfil_idperfil = $_POST['perfil_idperfil'];
$receita_idreceita = $_POST['receita_idreceita'];
$comentario = $_POST ['comentario'];
$nota = $_POST['nota'];

if ($id == 0) {
    salvarAvaliacao($conexao, $comentario, $nota, $receita_idreceita, $perfil_idperfil);
} else {
    editarAvaliacao($conexao, $comentario, $nota, $perfil_idperfil, $receita_idreceita);
}

header("Location: /public/formAvaliacao.php");
?>