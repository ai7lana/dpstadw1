<?php

require_once "../conexao.php";
require_once "../funcoes.php";

$nome = "pessoa";

echo "<pre>";
print_r(pesquisarPerfilNome($conexao, $nome));
echo "</pre>";
?>