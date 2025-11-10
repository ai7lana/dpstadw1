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
    <script src="jquery-3.7.1.min.js"></script>
    <script src="jquery.validate.min.js"></script>
    <link rel="stylesheet" href="style/reset.css">
    <link rel="stylesheet" href="style/style.css">
    <title>Perfil</title>
</head>
<body class="bodyperfil">
    <div class="barrasuperior"></div>
    <div class="barralateral"></div>
    
    <p class="tituloperfil" id="titperfil"><img src="" alt="">Bem-vindo, <?php echo htmlspecialchars($nome_perfil_logado); ?>!</p>

    <div class="linkperfildiv">
        <a href="formReceita.php" class="linkperfil" id="receitasp"> <img src="style/images/adicionar.png" alt="" class="addreceita"> adicionar receita</a> <br>
        <a href="listarReceita.php" class="linkperfil" id="listreceitas"> class="reeitasver">ver receitas</a> <br>
        <a href="formPesquisar.php" class="linkperfil" id="pesquisarp"> <img src="style/images/pesquisar.png" alt=""> buscar receita</a> <br>
        <a href="listarComentario.php" class="linkperfil" id="listcomentarios"> <img src="style/images/comentarios.png" alt="">avaliacoes </a> <br>
        <a href="listarFavoritos.php" class="linkperfil" id="listfav"> <img src="style/images/favoritos.png" alt="" class="favoritos">Favoritos </a> <br>
        <a href="receitaPropria.php" class="linkperfil" id="minhasreceitas"> Minhas Receitas </a> <br>
        <a href="editarPerfil.php" class="linkperfil" id="editarp"> <img src="style/images/editarperfil.png" alt="" class="editarperfil">editar perfil</a> <br> <br><br><br>
    </div>

    <div class="acoesperfil">
        <a href="../deslogar.php" class="linkperfil" class="deslogar"> sair </a>
        <br>
        <input type="button" value="Voltar" onclick="javascript:history.go(-1)">
    </div>
</body>
</html>