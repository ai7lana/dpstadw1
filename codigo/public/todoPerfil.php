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
    <title>Meu Perfil</title>
</head>

<body class="bodyperfil">
    <div class="barrasuperior">
        <div class="brasilperfildiv">
            <p class="brasilperfil">Brasil <br> Na Cozinha</p>
        </div>
        <p class="tituloperfil" id="titperfil"><img src="" alt="">Bem-vindo,
            <?php echo htmlspecialchars($nome_perfil_logado); ?>!
        </p>
        <img src="style/images/perfil.png" alt="" class="fotoperfil">

    </div>
    <div class="barralateral">

        <a href="listarReceita.php" target="receitas" class="linkperfil" id="listreceitasperfil">Ver receitas</a> <br>

        <a href="formPesquisar.php" class="linkperfil" id="pesquisarperfil"> Buscar receita</a> <br>
        <img src="style/images/pesquisar.png" class="iconperfil" id="buscarreceitaimg">

        <a href="listarComentario.php" class="linkperfil" id="listcomentariosperfil"> avaliacoes </a> <br>
        <img src="style/images/comentarios.png" class="iconperfil" id="avaliacoesimg" alt="">

        <a href="listarFavoritos.php" class="linkperfil" id="listfavperfil"> Favoritos </a> <br>
        <img src="style/images/favoritos.png" alt="" class="iconperfil" id="favsimg">

        <a href="receitaPropria.php" target="receitas" class="linkperfil" id="minhasreceitasperfil"> Minhas Receitas
        </a>
        <img src="style/images/minhasreceitas.png" class="iconperfil" id="minhasreceitasicon" alt="">

        <a href="editarPerfil.php" class="linkperfil" id="editarperfil"> editar perfil</a>
        <img src="style/images/editarperfil.png" alt="" class="iconperfil" id="editarperfilicon">
        <a href="../deslogar.php" class="linkperfil" id="deslogar"> sair </a>
        <img src="style/images/logout.png" alt="" class="iconperfil" id="deslogarperfil">
    </div>
    <div class="linkperfildiv">

    </div>

    <div class="acoesperfil">
        <br>
        <div class="voltardiv">
            <button onclick="history.go(-1)" class="voltar" id="voltarperfil"> ↩ Voltar </button>
        </div>
    </div>
    <iframe name="receitas" frameborder="0" class="iframeperfil"></iframe>
</body>

</html>