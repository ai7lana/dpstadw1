<?php

require_once "../conexao.php";
require_once "../funcoes.php";

$comentario = "Receita merda!";
$nota = "1" ;
$receita_idreceita = 3;
$perfil_idperfil = 1; 

salvarAvaliacao ($conexao, $comentario, $nota, $receita_idreceita, $perfil_idperfil);

?>