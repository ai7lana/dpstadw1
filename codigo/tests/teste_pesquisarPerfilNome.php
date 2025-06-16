<?php

require_once "../conexao.php";
require_once "../funcoes.php";

$nome = "jfffose";

echo "<pre>";
print_r(pesquisarPerfilNome($conexao, $nome));
echo "</pre>";
?>