<?php

require_once "../conexao.php";
require_once "../funcoes.php";

$nome_perfil = "carlitos";

echo "<pre>";
print_r(pesquisarPerfilNomePerfil($conexao, $nome_perfil));
echo "</pre>";
?>