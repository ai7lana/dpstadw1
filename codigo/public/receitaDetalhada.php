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
        $nome_perfil = $receita['perfil_idperfil'];


        echo "$nome_comida";
    }
    else {
        header("Location: erro.php");
    }






?>