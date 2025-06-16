<?php

require_once "../conexao.php";
require_once "../funcoes.php";

$perfil_idperfil = 1;
$receita_idreceita = 1;

echo "<pre>";
print_r(pesquisarAvaliacaoId($conexao, $perfil_idperfil, $receita_idreceita));
echo "</pre>";
?>