<?php
require_once "conexao.php";
require_once "funcoes.php";

// Recebe dados do formulário
$perfil_idperfil = $_POST['perfil_idperfil'];
$receita_idreceita = $_POST['receita_idreceita'];
$id = isset($_POST['id']) ? $_POST['id'] : 0; 

if ($id == 0) {
    salvarFavoritos($conexao, $perfil_idperfil, $receita_idreceita);
} else {
    editarFavoritos($conexao, $perfil_idperfil, $receita_idreceita, $id);
}


header("Location: /public/listarFavoritos.php");
?>
