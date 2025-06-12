<?php

require_once "../conexao.php";
require_once "../funcoes.php";

$tipo = "mole";

echo "<pre>";
print_r(pesquisarReceitaNome($conexao, $tipo));
echo "</pre>";
?>