<?php

require_once "../conexao.php";
require_once "../funcoes.php";

$idperfil = 1;

echo "<pre>";
print_r(pesquisarPerfilId($conexao, $idperfil)
);
echo "</pre>";
?>