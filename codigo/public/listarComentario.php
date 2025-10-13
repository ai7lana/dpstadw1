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
    <h1>Lista de Avaliacao</h1>

    <?php
    require_once "../conexao.php";
    require_once "../funcoes.php";

    $listar_avaliacao = listarAvaliacao($conexao); 

    if (count($listar_avaliacao) == 0) {
        echo "Não existem perfis cadastrados";
    } else {
    ?>
        <table border="1">
            <tr>

                <td>Nome do perfil</td>
                <td>Nome da Receita</td>
                <td>Comentario</td>
                <td>Nota</td>
                <td colspan="2">Ação</td>
            </tr>
        <?php
        foreach ($listar_avaliacao as $avaliacao) {
            $perfil_idperfil= $avaliacao ['perfil_idperfil'];
            $receita_idreceita = $avaliacao ['receita_idreceita'];
            $comentario =  $avaliacao ['comentario'];
            $nota = $avaliacao ['nota'];

            echo "<tr>";
            

            echo "<td>$perfil_idperfil</td>";
            echo "<td>$receita_idreceita</td>";
            echo "<td>$comentario</td>";
            echo "<td>$nota</td>";
            echo "<td><a href='deletarComentario.php?id=$perfil_idperfil and id=$receita_idreceita'>Excluir</a></td>";
            echo "<td><a href='formAvaliacao.php?id=$perfil_idperfil and id=$receita_idreceita'>Editar</a></td>";
            echo "</tr>";
        }
    }
        ?>
        </table>
        <input type="button" value="Voltar" onclick="javascript:history.go(-1)">

  <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
</body>
</html>
