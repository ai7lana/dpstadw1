<?php

require_once "conexao.php";
require_once "funcoes.php";

$perfil_idperfil = $_POST['perfil_idperfil'];
$receita_idreceita = $_POST['receita_idreceita'];
$comentario = $_POST ['comentario'];
$nota = $_POST['nota'];

salvarAvaliacao($conexao, $perfil_idperfil, $receita_idreceita, $comentario, $nota);

header("Location: /public/formFavoritos.php");
?>