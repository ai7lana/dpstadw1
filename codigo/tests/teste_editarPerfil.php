<?php

require_once "../conexao.php";
require_once "../funcoes.php";



editarCliente($conexao, $nome, $cpf, $endereco, $id);

echo "<pre>";
print_r(listarClientes($conexao));
echo "</pre>";
?>