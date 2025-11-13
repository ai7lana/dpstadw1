<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <script src="../jquery-3.7.1.min.js"></script>
    <link rel="stylesheet" href="style/style.css">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.8/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-sRIl4kxILFvY47J16cr9ZwB07vP4J8+LH7qKQnuqkuIAvNWLzeN8tE5YBujZqJLB" crossorigin="anonymous">
</head>

<body class="bodyListar">
    <div class="titulopesquisardiv">
        <p class="titulopesquisar" id="listar">Brasil <br> Na Cozinha</p>
    </div>

    <div class="listartudodiv">


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
            <table border="1" class="table">
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
                    echo "<td><a href='formFavoritos.php?id=$id' class='Excluiretabela'> favoritar </a></td>";
                    echo "<td><a href='formAvaliacao.php?id=$id' class='Excluiretabela'> Comentar  </a></td>";
                    echo "<td></td>";
                    echo "</tr>";
                }
                ?>
            </table>
    </div>
    <button type="button" onclick="history.go(-1)" class="voltar" id="voltarlistarreceitas"> ↩ Voltar </button>
<?php
        }
?>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.8/dist/js/bootstrap.bundle.min.js" integrity="sha384-FKyoEForCGlyvwx9Hj09JcYn3nv7wiPVlz7YYwJrWVcXK/BmnVDxM+D2scQbITxI" crossorigin="anonymous"></script>
</div>
</body>

</html>