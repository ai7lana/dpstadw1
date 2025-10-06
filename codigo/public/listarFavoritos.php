<!DOCTYPE html>
<html lang="pt-BR">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Lista de Perfis</title>
  <script src="../jquery-3.7.1.min.js"></script>
  <link rel="stylesheet" href="style/style.css">
</head>
<body>
    <h1>Lista de Perfis</h1>

    <?php
    require_once "../conexao.php";
    require_once "../funcoes.php";

    $listar_fav = listarFavorito($conexao); 

    if (count($listar_fav) == 0) {
        echo "Não existem perfis cadastrados";
    } else {
    ?>
        <table border="1">
            <tr>

                <td>Nome do perfil</td>
                <td>Nome da Receita</td>
                <td colspan="2">Ação</td>
            </tr>
        <?php
        foreach ($listar_fav as $fav) {
            $perfil_idperfil= $fav ['perfil_idperfil'];
            $receita_idreceita= $fav['receita_idreceita'];

            echo "<tr>";
            

            echo "<td>$perfil_idperfil</td>";
            echo "<td>$receita_idreceita</td>";
            echo "<td><a href='deletarFav.php?id=$perfil_idperfil and id=$receita_idreceita'>Excluir</a></td>";
            echo "<td><a href='formFavoritos.php?id=$perfil_idperfil and id=$receita_idreceita'>Editar</a></td>";
            echo "</tr>";
        }
    }
        ?>
        </table>

  <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
</body>
</html>
