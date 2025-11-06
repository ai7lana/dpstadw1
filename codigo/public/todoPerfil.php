<?php
require_once "../verificarLogado.php";
require_once "../conexao.php";

// Garante que a sessão tem o ID do perfil
if (!isset($_SESSION['id_perfil'])) {
    die("Erro: ID do perfil não encontrado. Faça login novamente.");
}

$id_perfil_logado = intval($_SESSION['id_perfil']);

// Busca o nome do perfil logado
$sqlPerfil = "SELECT nome_perfil FROM perfil WHERE idperfil = $id_perfil_logado";
$resultadoPerfil = mysqli_query($conexao, $sqlPerfil) or die("Erro ao buscar nome do perfil: " . mysqli_error($conexao));

$dadosPerfil = mysqli_fetch_assoc($resultadoPerfil);
$nome_perfil_logado = $dadosPerfil['nome_perfil'] ?? 'Usuário desconhecido';
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>

    <h2>Bem-vindo, <?php echo htmlspecialchars($nome_perfil_logado); ?>!</h2>
    <hr>
    
    <a href="formReceita.php"> add receita</a> <br>
    <a href="listarReceita.php"> ver receitas</a> <br>
    <a href="formPesquisar.php"> buscar receita</a> <br>
    <a href="listarComentario.php"> avaliacoes </a> <br>
    <a href="listarFavoritos.php"> Favoritos </a> <br>
    <a href="receitaPropria.php">  Minhas Receitas </a> <br>
    <a href="editarPerfil.php">editar perfil</a> <br> <br><br><br>

    <a href="../deslogar.php"> sair </a>
    

    <br>
    <input type="button" value="Voltar" onclick="javascript:history.go(-1)">

     
</body>
</html>