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
</head>
<body>
    <h2>Minhas Receitas</h2>
    <a href="formReceita.php">Adicionar nova receita</a> <br><br>

<?php
if (mysqli_num_rows($resultado) == 0) {
    echo "<p>Não existem receitas cadastradas.</p>";
} else {
    echo "<table border='1'>
            <tr>
                <td>Id</td>
                <td>Nome da comida</td>
                <td>Tipo</td>
                <td>Ingredientes</td>
                <td>Modo de preparo</td>
                <td>Tempo</td>
                <td>Rendimento</td>
                <td>Foto</td>
                <td>Região</td>
                <td>Nome do perfil</td>
                <td colspan='2'>Ação</td>
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
                <td>$nome_comida</td>
                <td>$tipo</td>
                <td>$ingredientes</td>
                <td>$modo_preparo</td>
                <td>$tempo</td>
                <td>$rendimento</td>
                <td><img src='foto/$foto' alt='Foto da comida' width='100'></td>
                <td>$regiao</td>
                <td>$nome_perfil</td>
                <td><a href='deletarReceita.php?id=$id'>Excluir</a></td>
                <td><a href='formReceita.php?id=$id'>Editar</a></td>
              </tr>";
    }

    echo "</table>";
}
?>
    <br>
    <input type="button" value="Voltar" onclick="javascript:history.go(-1)">
</body>
</html>
