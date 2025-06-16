<?php

require_once "../conexao.php";
require_once "../funcoes.php";

$ingredientes = "Massa, queijo, molho de tomate";

echo "<pre>";
print_r(pesquiarReceitaIngredientes($conexao, $ingredientes));
echo "</pre>";
?>