<?php

require_once "../conexao.php";
require_once "../funcoes.php";

$perfil_idperfil = 1;

echo "<pre>";
print_r(pesquisarReceitaPerfil($conexao, $perfil_idperfil));
echo "</pre>";
?>