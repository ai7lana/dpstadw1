<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <script src="../jquery-3.7.1.min.js"></script>
</head>
<body>
     <h1>Lista de receitas</h1>

    <?php
    require_once "../conexao.php";
    require_once "../funcoes.php";


    $sql = "SELECT
        receita.idreceita,
        receita.nome_comida,
        receita.tipo,
        receita.ingredientes,
        receita.modo_de_preparo,
        receita.tempo,
        receita.rendimento,
        receita.foto,
        receita.regiao,
        perfil.nome_perfil
        FROM
        receita
        INNER JOIN
        perfil ON receita.perfil_idperfil = perfil.idperfil
        ORDER BY receita.idreceita;";


    $comando = mysqli_prepare($conexao, $sql);

    mysqli_stmt_execute($comando);

    $resultados = mysqli_stmt_get_result($comando);

    if (mysqli_num_rows($resultados) == 0) {
        echo "Não existem receitas cadastradas.";
    } else {
    ?>
        <table border="1">
            <tr>
                <td>Id</td>
                <td>Nome da comida</td>
                <td>Tipo</td>
                <td>Ingredientes</td>
                <td>Modo de preparar</td>
                <td>Tempo</td>
                <td>Rendimento</td>
                <td>Foto</td>
                <td>Região</td>
                <td>Nome do perfil</td>
                <td colspan="2"> Adicionar </td>
            </tr>

        <?php

        while ($receita = mysqli_fetch_assoc($resultados)) {
            $id = $receita['idreceita'];
            $nome_comida = $receita['nome_comida'];
            $tipo = $receita['tipo'];
            $ingredientes = $receita['ingredientes'];
            $modo_preparo = $receita['modo_de_preparo'];
            $tempo = $receita['tempo'];
            $rendimento = $receita['rendimento'];
            $foto = $receita['foto'];
            $regiao = $receita['regiao'];
            $nome_perfil = $receita['nome_perfil'];

            echo "<tr>";
            echo "<td>$id</td>";
            echo "<td>$nome_comida</td>";
            echo "<td>$tipo</td>";
            echo "<td>$ingredientes</td>";
            echo "<td>$modo_preparo</td>";
            echo "<td>$tempo</td>";
            echo "<td>$rendimento</td>";
            echo "<td><img src='foto/$foto' alt='Foto da comida' width='100'></td>";
            echo "<td>$regiao</td>";
            echo "<td>$nome_perfil</td>";
            echo "<td><a href='formFavoritos.php'> favoritar </a></td>";
            echo "<td><a href='formAvaliacao.php'> Comentar </a></td>";
            echo "<td></td>";
            echo "</tr>";
        }
        ?>
        </table>
        <input type="button" value="Voltar" onclick="javascript:history.go(-1)">
    <?php
    }
    ?>
</body>
</html>
