<?php
require_once "conexao.php";
require_once "funcoes.php";

// Recebe dados do formulário
$perfil_idperfil = $_POST['perfil_idperfil'];
$receita_idreceita = $_POST['receita_idreceita'];
$id = isset($_POST['id']) ? $_POST['id'] : 0; // inicializa $id

if ($id == 0) {
    salvarFavoritos($conexao, $perfil_idperfil, $receita_idreceita);
} else {
    editarFavoritos($conexao, $perfil_idperfil, $receita_idreceita, $id);
}

// Redireciona para o formulário
header("Location: /public/formFavoritos.php");
exit; // boa prática após header
?>
