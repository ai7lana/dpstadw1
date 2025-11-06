<?php
    require_once "../funcoes.php";
    require_once "../conexao.php";
    $id = $_GET['id'];

if (pesquisarReceitaId($conexao, $id)) {
    $receita = pesquisarReceitaId($conexao, $id);
    
    $nome_comida = $receita['nome_comida'];
    $tipo = $receita['tipo'];
    $ingredientes = $receita['ingredientes'];
    $modo_de_preparo = $receita['modo_de_preparo'];
    $tempo = $receita['tempo'];
    $rendimento = $receita['rendimento'];
    $foto = $receita['foto'];
    $regiao = $receita['regiao'];
    $nome_perfil = $receita['nome_perfil'];
?>
    <!-- ⬇️ Aqui você sai do PHP e escreve HTML normalmente -->
    <!DOCTYPE html>
    <html lang="pt-br">
    <head>
        <meta charset="UTF-8">
        <title><?= htmlspecialchars($nome_comida) ?></title>
        <link rel="stylesheet" href="style/reset.css">
        <link rel="stylesheet" href="style/style.css">
        <style>
            img {
                width: 200px;
                border-radius: 8px;
            }
        </style>
    </head>
    <div class="barralateralreceitadetalhada">
        <p>...</p>
    </div>
    <body class=bodyreceitadetalhada>
            <p class="tituloreceitadetalhada"><?= htmlspecialchars($nome_comida) ?></p>
            <p><strong>Tipo:</strong> <?= htmlspecialchars($tipo) ?></p>
            <p><strong>Ingredientes:</strong><br> <?= nl2br(htmlspecialchars($ingredientes)) ?></p>
            <p><strong>Modo de preparo:</strong><br> <?= nl2br(htmlspecialchars($modo_de_preparo)) ?></p>
            <p><strong>Tempo:</strong> <?= htmlspecialchars($tempo) ?></p>
            <p><strong>Rendimento:</strong> <?= htmlspecialchars($rendimento) ?></p>
            <img src="foto/<?= htmlspecialchars($foto) ?>" alt="Foto da comida">
            <p><strong>Região:</strong> <?= htmlspecialchars($regiao) ?></p>
            <p><strong>Autor:</strong> <?= htmlspecialchars($nome_perfil) ?></p>
    </body>
    </html>
<?php
} else {
    header("Location: erro.php");
}
?>
