<?php
require_once "../conexao.php";
require_once "../funcoes.php";     

$perfil_idperfil = 2;            
$receita_idreceita = 3; 

salvarFavoritos($conexao, $perfil_idperfil, $receita_idreceita);
?>
