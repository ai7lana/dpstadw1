<?php

require_once "../conexao.php";
require_once "../funcoes.php";

$nome = "pessoa";

echo "<pre>";
print_r(pesquisarReceitaNome($conexao, $nome));
echo "</pre>";
?>