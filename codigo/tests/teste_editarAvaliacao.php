<?php

require_once "../conexao.php";
require_once "../funcoes.php";

$comentario = "eu gostei";
$nota = "2.5";
$perfil_idperfil = "3";
$receita_idreceira = "2";

editarAvaliacao($conexao, $comentario, $nota, $perfil_idperfil, $receita_idreceira);

echo "<pre>";
print_r(listarAvaliacao($conexao));
echo "</pre>";
?>