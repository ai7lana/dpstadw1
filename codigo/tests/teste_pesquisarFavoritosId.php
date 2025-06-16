<?php

require_once "../conexao.php";
require_once "../funcoes.php";

$receita_idreceira = 1;
$perfil_idperfil = 1;

echo "<pre>";
print_r(pesquisarFavoritosId($conexao, $perfil_idperfil, $receita_idreceira));
echo "</pre>";
?>