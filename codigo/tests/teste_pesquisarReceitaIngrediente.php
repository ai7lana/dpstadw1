<?php

require_once "../conexao.php";
require_once "../funcoes.php";

$ingredientes = "assuca";

echo "<pre>";
print_r(pesquiarReceitaIngredientes($conexao, $ingredientes));
echo "</pre>";
?>