<?php
session_start();

require_once "../conexao.php";
require_once "../funcoes.php";


if (!isset($_SESSION['logado']) || $_SESSION['logado'] !== 'sim') {
    header("Location: ../index.php");
    exit;
}


if (!isset($_SESSION['id_perfil'])) {
    die("Erro: sessão sem ID de perfil. Faça login novamente.");
}

$id_perfil_logado = intval($_SESSION['id_perfil']); // força ser número inteiro

$sqlPerfil = "SELECT nome_perfil FROM perfil WHERE idperfil = $id_perfil_logado";
$resultadoPerfil = mysqli_query($conexao, $sqlPerfil) or die("Erro ao buscar nome do perfil: " . mysqli_error($conexao));

$dadosPerfil = mysqli_fetch_assoc($resultadoPerfil);
$nome_perfil_logado = $dadosPerfil['nome_perfil'] ?? 'Usuário desconhecido';


if (isset($_GET['id'])) {
    $id = intval($_GET['id']); // também converte pra número
    $receita = pesquisarReceitaId($conexao, $id);

    $nome_comida = $receita['nome_comida'];
    $tipo = $receita['tipo'];
    $ingredientes = $receita['ingredientes'];
    $modo_de_preparo = $receita['modo_de_preparo'];
    $tempo = $receita['tempo'];
    $rendimento = $receita['rendimento'];
    $foto = $receita['foto'];
    $regiao = $receita['regiao'];
    $perfil_idperfil = $receita['perfil_idperfil'];

    $botao = "Atualizar";
} else {
    $id = 0;
    $nome_comida = "";
    $tipo = "";
    $ingredientes = "";
    $modo_de_preparo = "";
    $tempo = "";
    $rendimento = "";
    $foto = "";
    $regiao = "";
    $perfil_idperfil = $id_perfil_logado;

    $botao = "Cadastrar";
}
?>


<!DOCTYPE html>
<html lang="pt-BR">

<head>
    <meta charset="UTF-8">
    <meta name="Receita" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <script src="../jquery-3.7.1.min.js"></script>
</head>

<body>
    <h2>Cadastro de Receita</h2>
    <form action="../salvarReceita.php?id=<?php echo $id; ?>" method="post" enctype="multipart/form-data">

        <input type="text" name="nome_comida" placeholder="Nome da receita" value="<?php echo $nome_comida; ?>"><br><br>

        <input type="text" name="tipo" placeholder="Tipo (almoço, lanche...)" value="<?php echo $tipo; ?>"><br><br>

        <input type="text" name="ingredientes" placeholder="Ingredientes" value="<?php echo $ingredientes; ?>"><br><br>

        <textarea name="modo_de_preparo" placeholder="Modo de preparo"
            value="<?php echo $modo_de_preparo; ?>"></textarea><br><br>

        <input type="text" name="tempo" placeholder="Tempo de preparo (ex: 45min)"
            value="<?php echo $tempo; ?>"><br><br>

        <input type="text" name="rendimento" placeholder="Rendimento (ex: 4 porções)"
            value="<?php echo $rendimento; ?>"><br><br>

        <input type="file" name="foto" value="<?php echo $foto; ?>"> <br><br>

        <input type="text" name="regiao" placeholder="Região (opcional)" value="<?php echo $regiao; ?>"><br><br>

        <input type="hidden" name="perfil_idperfil" value="<?php echo $perfil_idperfil; ?>">
        <input type="text" value="<?php echo htmlspecialchars($nome_perfil_logado); ?>" readonly><br><br>

        <input type="submit" value="<?php echo $botao; ?>">
        <input type="button" value="Voltar" onclick="javascript:history.go(-1)">

    </form>
</body>

</html>