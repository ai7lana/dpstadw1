<?php

require_once "../conexao.php";
require_once "../funcoes.php";

$comentario = "Receita incrível! ";
$nota = "cinco";
$receita_idreceita = 1;
$perfil_idperfil = 1; 

salvarAvaliacao ($conexao, $comentario, $nota, $receita_idreceita, $perfil_idperfil);

?>