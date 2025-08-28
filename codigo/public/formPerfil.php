
<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Document</title>
  <script src="../jquery-3.7.1.min.js"></script>
</head>
<body>
  <h2>Criar Perfil</h2>
  <form action="../salvarPerfil.php" method="POST">
    
    Nome: <br><input type="text" name="nome" required><br>
    Nome de Usuário: <br> <input type="text" name="nome_perfil" required><br>
    Email: <br> <input type="email" name="email" required><br>
    Senha: <br> <input type="password" name="senha" required><br>

    <button type="submit">Salvar</button>
</form>

</body>
</html>