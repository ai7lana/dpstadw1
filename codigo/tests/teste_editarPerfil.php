<?php

require_once "../conexao.php";
require_once "../funcoes.php";


editarPerfil($conexao, $nome, $nome_perfil, $usuario_idusario,  $email, $senha);

echo "<pre>";
print_r(listarPerfil($conexao));
echo "</pre>";
?>