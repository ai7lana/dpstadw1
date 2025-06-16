<?php

require_once "../conexao.php";
require_once "../funcoes.php";

$regiao = "norte";

echo "<pre>";
print_r(pesquisarReceitaRegiao($conexao, $regiao));
echo "</pre>";
?>