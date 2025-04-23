<?php

require_once "../conexao.php";
require_once "../funcoes.php";

echo "<pre>";
print_r(listarReceita($conexao));
echo "</pre>";
?>