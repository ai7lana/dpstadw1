<?php

require_once "../conexao.php";
require_once "../funcoes.php";

$idreceita = 1;

echo "<pre>";
print_r(pesquisarReceitaId($conexao, $idreceita));
echo "</pre>";
?>