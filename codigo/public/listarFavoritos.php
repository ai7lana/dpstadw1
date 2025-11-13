<?php
//session_start();
require_once "../verificarLogado.php";
require_once "../conexao.php";

// Verifica se o usuário está logado
if (!isset($_SESSION['id_perfil'])) {
    die("Erro: faça login novamente.");
}
$id_perfil_logado = intval($_SESSION['id_perfil']);

// Busca receitas favoritas do usuário logado
$sql = "SELECT f.perfil_idperfil, f.receita_idreceita, 
               r.nome_comida AS nome_receita, 
               p.nome_perfil
        FROM favoritos f
        INNER JOIN receita r ON f.receita_idreceita = r.idreceita
        INNER JOIN perfil p ON f.perfil_idperfil = p.idperfil
        WHERE f.perfil_idperfil = $id_perfil_logado";

$resultado = mysqli_query($conexao, $sql) or die("Erro ao buscar favoritos: " . mysqli_error($conexao));
?>

<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Meus Favoritos</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.8/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body>
    <div class="container mt-5">
        <h2>Receitas Favoritas</h2>
        <table class="table table-striped mt-3">
            <tr>
                <th>Usuário</th>
                <th>Receita</th>
                <th>Ação</th>
            </tr>

            <?php
            if (mysqli_num_rows($resultado) > 0) {
                while ($linha = mysqli_fetch_assoc($resultado)) {
                    $perfil_idperfil = $linha['perfil_idperfil'];
                    $receita_idreceita = $linha['receita_idreceita'];
                    $nome_perfil = htmlspecialchars($linha['nome_perfil']);
                    $nome_receita = htmlspecialchars($linha['nome_receita']);

                    echo "<tr>";
                    echo "<td>$nome_perfil</td>";
                    echo "<td>$nome_receita</td>";
                    echo "<td><a href='deletarFav.php?perfil=$perfil_idperfil&receita=$receita_idreceita' class='btn btn-danger btn-sm'>Excluir</a></td>";
                    // echo "<td><a href='formFavoritos.php?perfil=$perfil_idperfil&receita=$receita_idreceita' class='btn btn-warning btn-sm'>Editar</a></td>";
                    echo "</tr>";
                }
            } else {
                echo "<tr><td colspan='4'>Nenhuma receita favorita encontrada.</td></tr>";
                // <td colspan="2">Ação</td>


                echo "<tr>";


                echo "<td>$nome_perfil</td>";
                echo "<td>$nome_receita</td>";
                // echo "<td><a href='deletarFav.php?perfil=$perfil_idperfil&receita=$receita_idreceita' class='Excluiretabela'>Excluir</a></td>";
                // echo "<td><a href='formFavoritos.html?perfil=$perfil_idperfil&receita=$receita_idreceita' class='Excluiretabela'>Editar</a></td>";

                echo "</tr>";
            }
            ?>
        </table>
    </div>

    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.8/dist/js/bootstrap.bundle.min.js" integrity="sha384-FKyoEForCGlyvwx9Hj09JcYn3nv7wiPVlz7YYwJrWVcXK/BmnVDxM+D2scQbITxI" crossorigin="anonymous"></script>
</body>
</html>
