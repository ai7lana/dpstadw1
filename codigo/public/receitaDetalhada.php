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
            <!-- <p class="tituloreceitadetalhada"><?= htmlspecialchars($nome_comida) ?></p> -->
            <p class="tituloreceitadetalhada">
            <?php
                $partes = explode(' ', trim($nome_comida), 2);
                ?>
                <p class="tituloreceitadetalhada">
                    <span class="linha1"><?= htmlspecialchars($partes[0]) ?></span>
                    <?php if (isset($partes[1])): ?>
                        <br><span class="linha2"><?= htmlspecialchars($partes[1]) ?></span>
                    <?php endif; ?>
            </p>

            <div class="tiporeceitadetalhada">
                <p>Tipo: <?= htmlspecialchars($tipo) ?></p>
            </div>

            <div>
                <p class="mododepreparoreceitadetalhada">Modo de preparo:<br> <?= nl2br(htmlspecialchars($modo_de_preparo)) ?></p>


            <p class="ingredientesreceitadetalhada">Ingredientes:<br> <?= nl2br(htmlspecialchars($ingredientes)) ?></p>

            <div class="temporeceitadetalhada">
                <p>Tempo:<?= htmlspecialchars($tempo) ?></p>
            </div>
            <div class="porcoesreceitadetalhada">
                <p>Rendimento: <?= htmlspecialchars($rendimento) ?></p>
            </div>

            <img src="foto/<?= htmlspecialchars($foto) ?>" alt="Foto da comida" class="imagemreceitadetalhada">
            
            <p class="regiaoreceitadetalhada">Região:<?= htmlspecialchars($regiao) ?></p>
            
            <p class="autorreceitadetalhada">Autor: <?= htmlspecialchars($nome_perfil) ?></p>
    </body>
    </html>
<?php
} else {
    header("Location: erro.php");
}
?>
