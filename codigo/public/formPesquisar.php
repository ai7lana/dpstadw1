<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <script src="../jquery-3.7.1.min.js"></script>
</head>
<body>

    
</body>
</html>





<?php
// Função de exemplo para simular busca
function buscarDados($termo) {
    $dados = [
        "Maçã",
        "Banana",
        "Laranja",
        "Abacaxi",
        "Manga"
    ];

    $resultados = [];

    foreach ($dados as $item) {
        if (stripos($item, $termo) !== false) {  // busca case-insensitive
            $resultados[] = $item;
        }
    }
    return $resultados;
}

if (isset($_GET['search'])) {
    $termo = trim($_GET['search']);
    
    if ($termo === '') {
        echo "Por favor, digite um termo para pesquisa.";
        exit;
    }

    $resultados = buscarDados($termo);

    if (count($resultados) > 0) {
        echo "Resultados para '<b>" . htmlspecialchars($termo) . "</b>':<br>";
        echo "<ul>";
        foreach ($resultados as $resultado) {
            echo "<li>" . htmlspecialchars($resultado) . "</li>";
        }
        echo "</ul>";
    } else {
        echo "Nenhum resultado encontrado para '<b>" . htmlspecialchars($termo) . "</b>'.";
    }
} else {
    echo "Nenhum termo de pesquisa enviado.";
}
?>