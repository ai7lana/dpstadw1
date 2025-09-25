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

    $lista_receitas = listarReceitas($conexao);

    if (count($lista_receitas) == 0) {
        echo "Não existem receitas cadastrados";
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
                <td>foto</td>
                <td>Regiao</td>
                <td>Nome do perfil</td>
                <td colspan="2">Ação</td>
            </tr>
        <?php
        foreach ($lista_receitas as $receita) {
    $id = $receita['idreceita'];
    $nome_comida = $receita['nome_comida'];
    $tipo = $receita['tipo'];
    $ingredientes = $receita['ingredientes'];
    $modo_preparo = $receita['modo_de_preparo'];
    $tempo = $receita['tempo'];
    $rendimento = $receita['rendimento'];
    $foto = $receita['foto'];
    $regiao = $receita['regiao'];
    $nome_perfil = $receita['perfil_idperfil'];

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
    echo "<td><a href='deletarReceita.php?id=$id'>Excluir</a></td>";
    echo "<td><a href='formReceita.php?id=$id'>Editar</a></td>";
    echo "</tr>";
        }
    }
        ?>
        </table>
</body>
</html>