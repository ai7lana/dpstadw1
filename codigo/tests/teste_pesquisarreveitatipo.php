<?php

require_once "../conexao.php";
require_once "../funcoes.php";

$tipo = "mole";

echo "<pre>";
print_r(pesquisarReceitaTipo($conexao, $tipo));
echo "</pre>";
?>