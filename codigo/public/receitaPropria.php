<?php

// alana aqui vai da erro e quando eu for apresentar o prof vai érguntar pq e eu irei respondes que o motivo é pq esta chamando a sessao duas vezes 

session_start();
require_once "../verificarLogado.php";
require_once "../conexao.php";

// pega o id do usuário logado
if (!isset($_SESSION['id_perfil'])) {
    die("Erro: faça login novamente.");
}
$id_perfil_logado = intval($_SESSION['id_perfil']);

// busca apenas as receitas do usuário logado e o nome do perfil
$sql = "SELECT r.*, p.nome_perfil 
        FROM receita r
        INNER JOIN perfil p ON r.perfil_idperfil = p.idperfil
        WHERE r.perfil_idperfil = $id_perfil_logado";

$resultado = mysqli_query($conexao, $sql) or die("Erro ao buscar receitas: " . mysqli_error($conexao));
?>

<!DOCTYPE html>
<html lang="pt-BR">

<head>
    <meta charset="UTF-8">
    <title>Minhas Receitas</title>
    <script src="jquery-3.7.1.min.js"></script>
    <script src="jquery.validate.min.js"></script>
    <link rel="stylesheet" href="style/reset.css">
    <link rel="stylesheet" href="style/style.css">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.8/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-sRIl4kxILFvY47J16cr9ZwB07vP4J8+LH7qKQnuqkuIAvNWLzeN8tE5YBujZqJLB" crossorigin="anonymous">
</head>

<body class="bodyaddreceita">
    <div class="lateraladdreceita"></div>
    <p class="minhasreceitas">Minhas Receitas</p>
    <a href="formReceita.html" class="addreceitalink"> adicionar nova receita</a> <br><br>
    <img src="style/images/adicionarreceita.png" alt="" class="addreceita">


    <div class="listartudo" id="minhasreceitasdiv">
        <?php
        if (mysqli_num_rows($resultado) == 0) {
            echo "<p>Não existem receitas cadastradas.</p>";
        } else {
            echo "<table border='1' class='tabel'>
            <tr>
                <td>&nbsp&nbspId</td>
                <td>&nbsp&nbspNome da comida</td>
                <td>&nbsp&nbspTipo</td>
                <td>&nbsp&nbspIngredientes</td>
                <td>&nbsp&nbspModo de preparo</td>
                <td>&nbsp&nbspTempo</td>
                <td>Rendimento</td>
                <td>&nbsp&nbspFoto</td>
                <td>&nbsp&nbspRegião</td>
                <td>&nbsp&nbspNome do perfil</td>
                <td colspan='2'>&nbsp&nbspAção</td>
            </tr>";

            while ($receita = mysqli_fetch_assoc($resultado)) {
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

                echo "<tr>
                <td>$id</td>
                <td>&nbsp&nbsp$nome_comida</td>
                <td>&nbsp&nbsp$tipo</td>
                <td>&nbsp&nbsp$ingredientes</td>
                <td>&nbsp&nbsp$modo_preparo</td>
                <td>&nbsp&nbsp$tempo</td>
                <td>&nbsp&nbsp$rendimento</td>
                <td>&nbsp&nbsp<img src='foto/$foto' alt='Foto da comida' width='100'></td>
                <td>&nbsp&nbsp$regiao</td>
                <td>&nbsp&nbsp$nome_perfil</td>
                <td><a href='deletarReceita.php?id=$id' class='Excluiretabela'>&nbsp&nbsp Excluir</a></td>
                <td><a href='formReceita.php?id=$id' class='Excluiretabela'>&nbsp&nbsp Editar</a></td>
              </tr>";
            }

            echo "</table>";
        }
        ?>
    </div>
    <br>
    <input type="button" value="Voltar" onclick="javascript:history.go(-1)">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.8/dist/js/bootstrap.bundle.min.js" integrity="sha384-FKyoEForCGlyvwx9Hj09JcYn3nv7wiPVlz7YYwJrWVcXK/BmnVDxM+D2scQbITxI" crossorigin="anonymous"></script>

</body>

</html>