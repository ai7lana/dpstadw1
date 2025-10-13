<?php

require_once "conexao.php";
require_once "funcoes.php";

$perfil_idperfil = $_POST['perfil_idperfil'];
$receita_idreceita = $_POST['receita_idreceita'];

if ($id == 0) {
    salvarFavoritos($conexao, $perfil_idperfil, $receita_idreceita);
} else {
    editarFavoritos($conexao, $perfil_idperfil, $receita_idreceita);
}

header("Location: /public/formFavoritos.php");
?>