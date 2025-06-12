<?php

require_once "../conexao.php";
require_once "../funcoes.php";

$inegrediente = "assuca";

echo "<pre>";
print_r(pesquisarReceitaNome($conexao, $ingrediente));
echo "</pre>";
?>