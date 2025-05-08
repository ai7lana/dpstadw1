<?php

require_once "../conexao.php";
require_once "../funcoes.php";

$comentario = "Receita boa!";
$nota = "5" ;
$receita_idreceita = 2;
$perfil_idperfil = 3; 

salvarAvaliacao ($conexao, $comentario, $nota, $receita_idreceita, $perfil_idperfil);

?>