<?php
require_once "conexao.php";
require_once "funcoes.php";

// Recebe dados do formulário
$perfil_idperfil = $_POST['perfil_idperfil'];
$receita_idreceita = $_POST['receita_idreceita'];
$comentario = $_POST['comentario'];
$nota = $_POST['nota'];
$id = isset($_POST['id']) ? $_POST['id'] : 0; // inicializa $id

if ($id == 0) {
    salvarAvaliacao($conexao, $comentario, $nota, $receita_idreceita, $perfil_idperfil);
} else {
    editarAvaliacao($conexao, $comentario, $nota, $perfil_idperfil, $receita_idreceita, $id);
}

header("Location: /public/listarComentario.php");
exit;
?>
