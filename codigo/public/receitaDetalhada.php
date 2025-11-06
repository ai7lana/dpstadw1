<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <?php
    if (isset($_GET['id'])) {
        require_once "../conexao.php";
        require_once "../funcoes.php";

        $id = $_GET['id'];

        $receita = pesquisarReceitaId($conexao, $id);
        
        $nome_comida = $receita['nome_comida'];
        $tipo = $receita['tipo'];
        $ingredientes = $receita['ingredientes'];
        $modo_de_preparo = $receita['modo_de_preparo'];
        $tempo = $receita['tempo'];
        $rendimento = $receita['rendimento'];
        $foto = $receita['foto'];
        $regiao = $receita['regiao'];
        $nome_perfil = $receita['perfil_idperfil'];

        $botao = "Atualizar";
    }
    else {
        echo "Não há detalhes";
    }
?>
</body>
</html>