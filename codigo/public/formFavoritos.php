<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <script src="../jquery-3.7.1.min.js"></script>
</head>
<body>
    <h2>Adicionar favoritos</h2>
    <form action="../salvarFavoritos.php" method="post">

    
    Perfil: <br><input type="text" name="perfil_idperfil" required><br>
    Receita: <br> <input type="text" name="receita_idreceita" required><br>

    <button type="submit">Salvar</button>



</body>
</html>