<?php

require_once "../conexao.php";
require_once "../funcoes.php";

$nome_comida = "Moqueca";

echo "<pre>";
print_r(pesquisarReceitaNome($conexao, $nome_comida));
echo "</pre>";
?>