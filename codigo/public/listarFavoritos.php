<!DOCTYPE html>
<html lang="pt-BR">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Lista de Favoritos</title>
  <script src="../jquery-3.7.1.min.js"></script>
  <link rel="stylesheet" href="style/style.css">
</head>
<body>
    <h1>Lista de Favoritos</h1>

    <?php
    require_once "../conexao.php";  // Inclui a conexão com o banco de dados
    require_once "../funcoes.php";   // Inclui as funções auxiliares, como listarFavorito

    // Obtém a lista de favoritos do banco de dados
    $lista_favorito = listarFavorito($conexao);

    if (count($lista_favorito) == 0) {
        echo "<p>Não existem favoritos cadastrados.</p>";
    } else {
    ?>
        <table border="1">
            <thead>
                <tr>
                    <th>ID</th>
                    <th>Nome</th>
                    <th>Link</th>
                    <th>Descrição</th>
                    <th colspan="2">Ação</th>
                </tr>
            </thead>
            <tbody>
        <?php
        // Loop para exibir cada favorito na tabela
        foreach ($lista_favorito as $favorito) {
            $idfavorito = $favorito['idfavorito'];
            $descricao = $favorito['descricao'];

            echo "<tr>";
            echo "<td>$idfavorito</td>";
            echo "<td>$descricao</td>";
            echo "<td><a href='deletarFavorito.php?id=$idfavorito' onclick='return confirm(\"Tem certeza que deseja excluir?\")'>Excluir</a></td>";
            echo "<td><a href='editarFavorito.php?id=$idfavorito'>Editar</a></td>";
            echo "</tr>";
        }
        ?>
            </tbody>
        </table>
    <?php
    }
    ?>

  <script src="https://code.jquery.com/jquery-3.6.0.
