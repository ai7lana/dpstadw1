<!DOCTYPE html>
<html lang="pt-BR">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Lista de Receitas (Simplificada)</title>
    <script src="../jquery-3.7.1.min.js"></script>
</head>
<body>
    <h1>Lista de receitas</h1>

    <?php
    require_once "../conexao.php";
    require_once "../funcoes.php";

    $lista_receitas = listarReceitas($conexao);

    

    if (count($lista_receitas) == 0) {
        echo "Não existem receitas cadastradas.";
    } else {
    ?>
        <table border="1">
            <tr>
                <th>Nome da comida</th>
                <th>Foto</th>
                <th>Mais Informaçoẽs</th>
            </tr>
            <?php
            foreach ($lista_receitas as $receita) {
                $nome_comida = $receita['nome_comida'];
                $foto = $receita['foto'];

                echo "<tr>";
                echo "<td>$nome_comida</td>";
                echo "<td><img src='foto/$foto' alt='Foto da comida' width='100'></td>";
                $id = $receita['idreceita'];
                echo "<td><a href='receitaDetalhada.php?id=$id'>Mais informações</a></td>";
                echo "</tr>";
            }
            ?>
        </table>
        <br>
      <!-- <input type="button" value="Voltar" onclick="javascript:history.go(-1)"> -->
      <form>
        <input type="button" value="Voltar" onClick="JavaScript: window.history.back();">
      </form>
      
    <?php } ?>
</body>
</html>
