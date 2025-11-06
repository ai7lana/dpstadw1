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


        echo "$nome_comida"; echo '<br>';
        echo "$tipo"; echo '<br>';
        echo "$ingredientes"; echo '<br>';
        echo "$modo_de_preparo"; echo '<br>';
        echo "$tempo"; echo '<br>';
        echo "$rendimento"; echo '<br>';
        echo "<img src='foto/$foto' alt='Foto da comida' width='100'>"; echo '<br>';
        echo "$regiao"; echo '<br>';
        echo "$nome_perfil"; echo '<br>';
        
        
    }
    else {
        header("Location: erro.php");
    }






?>