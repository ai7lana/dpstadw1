<?php
//session_start();
require_once "../verificarLogado.php";
require_once "../conexao.php";

// Verifica se o usuário está logado
if (!isset($_SESSION['id_perfil'])) {
    die("Erro: faça login novamente.");
}
$id_perfil_logado = intval($_SESSION['id_perfil']);

// Busca apenas as avaliações do usuário logado
$sql = "SELECT 
            a.perfil_idperfil, 
            a.receita_idreceita, 
            a.comentario, 
            a.nota, 
            r.nome_comida AS nome_receita, 
            p.nome_perfil
        FROM avaliacao a
        INNER JOIN receita r ON a.receita_idreceita = r.idreceita
        INNER JOIN perfil p ON a.perfil_idperfil = p.idperfil
        WHERE a.perfil_idperfil = $id_perfil_logado
        ORDER BY r.nome_comida ASC";

$resultado = mysqli_query($conexao, $sql) or die("Erro ao buscar avaliações: " . mysqli_error($conexao));
?>

<!DOCTYPE html>
<html lang="pt-BR">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Minhas Avaliações</title>
    <script src="../jquery-3.7.1.min.js"></script>
    <link rel="stylesheet" href="style/style.css">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.8/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-sRIl4kxILFvY47J16cr9ZwB07vP4J8+LH7qKQnuqkuIAvNWLzeN8tE5YBujZqJLB" crossorigin="anonymous">
</head>

<body class="bodyListar">
    <div class="titulopesquisardiv">
        <p class="titulopesquisar" id="listar">Brasil <br> Na Cozinha</p>
    </div>

    <div class="listartudo">

        <!-- <h2>Minhas Avaliações</h2> -->

        <?php
        if (mysqli_num_rows($resultado) == 0) {
            echo "<p>Você ainda não fez nenhuma avaliação.</p>";
        } else {
        ?>
            <table border="1" class="table table-striped table-hover">
                <tr class="table-dark">
                    <th>Nome do Perfil</th>
                    <th>Nome da Receita</th>
                    <th>Comentário</th>
                    <th>Nota</th>
                    <th colspan="2">Ações</th>
                </tr>

                <?php
                while ($avaliacao = mysqli_fetch_assoc($resultado)) {
                    $perfil_idperfil = $avaliacao['perfil_idperfil'];
                    $receita_idreceita = $avaliacao['receita_idreceita'];
                    $nome_perfil = htmlspecialchars($avaliacao['nome_perfil']);
                    $nome_receita = htmlspecialchars($avaliacao['nome_receita']);
                    $comentario = htmlspecialchars($avaliacao['comentario']);
                    $nota = htmlspecialchars($avaliacao['nota']);

                    echo "<tr>";
                    echo "<td>$nome_perfil</td>";
                    echo "<td>$nome_receita</td>";
                    echo "<td>$comentario</td>";
                    echo "<td>$nota</td>";
                    echo "<td><a href='formAvaliacao.php?perfil=$perfil_idperfil&receita=$receita_idreceita' class='btn btn-warning btn-sm'>Editar</a></td>";
                    echo "<td><a href='deletarComentario.php?perfil=$perfil_idperfil&receita=$receita_idreceita' class='btn btn-danger btn-sm' onclick='return confirm(\"Deseja realmente excluir esta avaliação?\")'>Excluir</a></td>";
                    echo "</tr>";
                }
                ?>
            </table>
        <?php
        }
        ?>
    </div>

    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.8/dist/js/bootstrap.bundle.min.js" integrity="sha384-FKyoEForCGlyvwx9Hj09JcYn3nv7wiPVlz7YYwJrWVcXK/BmnVDxM+D2scQbITxI" crossorigin="anonymous"></script>
</body>
</html>
