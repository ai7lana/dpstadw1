<?php

require_once "../conexao.php";
require_once "../funcoes.php";

$ingredientes = "assuca";

echo "<pre>";
print_r(pesquisarReceitaNome($conexao, $ingredientes));
echo "</pre>";
?>