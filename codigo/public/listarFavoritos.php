<?php
require_once "../verificarLogado.php";
require_once "../conexao.php";
require_once "../funcoes.php";

$idsessao = $_SESSION['idperfil']; // ou o nome correto da variável da sessão

$listar_fav = listarFavorito($conexao, $idsessao); 
?>
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
    <h1>Lista de Favoritos</h1>

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
            $nome_perfil = $fav['nome_perfil'];
            $nome_receita = $fav['nome_receita'];


            echo "<tr>";
            

            echo "<td>$nome_perfil</td>";
            echo "<td>$nome_receita</td>";
            echo "<td><a href='deletarFav.php?perfil=$perfil_idperfil&receita=$receita_idreceita'>Excluir</a></td>";
            echo "<td><a href='formFavoritos.php?perfil=$perfil_idperfil&receita=$receita_idreceita'>Editar</a></td>";

            echo "</tr>";
        }
    }
        ?>
        </table>
        <form>
        <input type="button" value="Voltar" onClick="JavaScript: window.history.back();">
        </form>

  <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
</body>
</html>
