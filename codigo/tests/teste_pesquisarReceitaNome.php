<?php

require_once "../conexao.php";
require_once "../funcoes.php";

$nome_comida = "Lasanha";

echo "<pre>";
print_r(pesquisarReceitaNome($conexao, $nome_comida));
echo "</pre>";
?>