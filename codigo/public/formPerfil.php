
<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Document</title>
  <script src="../jquery-3.7.1.min.js"></script>
  <link rel="stylesheet" href="style/style.css">
</head>
<body id="bodyperfil">
  <div class="container">
      <form class="form-container" action="../salvarPerfil.php" method="POST">
    
      Nome: <br><input type="text" name="nome" id="nome" required><br>
      Nome de Usuário: <br> <input type="text" name="nome_perfil" id="usuario" required><br>
      Email: <br> <input type="email" name="email" id="email" required><br>
      Senha: <br> <input type="password" name="senha" id="senha" required><br>

      <button type="submit">Salvar</button>
      <p>Já tem uma conta? <a href="#">Entrar</a></p>
      </form>
  </div>
  <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
  <script src="app.js"></script>

</body>
</html>