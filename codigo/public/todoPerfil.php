<?php

require_once "./codigo/verificarLogado.php";
require_once "./codigo/verificarLogin.php";

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    
    <a href="formReceita.php"> add receita</a> <br>
    <a href="listarReceita.php"> ver receitas</a> <br>
    <a href="formPesquisar.php"> buscar receita</a> <br>
    <a href="listarComentario.php"> avaliacoes </a> <br>
    <a href="listarFavoritos.php"> Favoritos </a> <br>
    <a href="editarPerfil.php">editar perfil</a> <br>
    

    <br>
    <input type="button" value="Voltar" onclick="javascript:history.go(-1)">

     
</body>
</html>