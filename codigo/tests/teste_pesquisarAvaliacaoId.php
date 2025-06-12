<?php

require_once "../conexao.php";
require_once "../funcoes.php";

$perfil_idperfil = 1;
$receita_idreceita = 2;

echo "<pre>";
print_r(pesquisarReceitaNome($conexao, $perfil_idperfil, $receita_idreceita));
echo "</pre>";
?>