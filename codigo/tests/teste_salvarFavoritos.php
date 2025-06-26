<?php
require_once "../conexao.php";
require_once "../funcoes.php";     

$perfil_idperfil = 1;            
$receita_idreceita = 1; 

salvarFavoritos($conexao, $perfil_idperfil, $receita_idreceita);
?>
