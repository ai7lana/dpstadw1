<?php

require_once "../conexao.php";
require_once "../funcoes.php";

$regiao = "norte";

echo "<pre>";
print_r(pesquisarReceitaNome($conexao, $regiao));
echo "</pre>";
?>