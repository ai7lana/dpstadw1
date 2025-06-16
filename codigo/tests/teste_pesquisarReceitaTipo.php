<?php

require_once "../conexao.php";
require_once "../funcoes.php";

$tipo = "Jantar";

echo "<pre>";
print_r(pesquisarReceitaTipo($conexao, $tipo));
echo "</pre>";
?>