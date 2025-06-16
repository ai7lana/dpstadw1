<?php

require_once "../conexao.php";
require_once "../funcoes.php";

$comentario = "assuca";

echo "<pre>";
print_r(pesquisarReceitaNome($conexao, $comentario));
echo "</pre>";
?>