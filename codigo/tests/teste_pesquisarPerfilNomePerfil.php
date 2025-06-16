<?php

require_once "../conexao.php";
require_once "../funcoes.php";

$nome_perfil = "pessoa.com";

echo "<pre>";
print_r(pesquisarReceitaNome($conexao, $nome_perfil));
echo "</pre>";
?>