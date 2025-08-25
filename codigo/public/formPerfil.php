<?php
require_once "../conexao.php"; // ajusta o caminho se necessário

if ($_SERVER["REQUEST_METHOD"] === "POST") {
    $nome        = $_POST["nome"] ?? "";
    $nome_perfil = $_POST["nome_perfil"] ?? "";
    $email       = $_POST["email"] ?? "";
    $senha       = $_POST["senha"] ?? "";

    // Segurança: criptografar a senha
    $senha_hash = password_hash($senha, PASSWORD_DEFAULT);

    // Preparar a query para evitar SQL Injection
    $sql = "INSERT INTO perfil (nome, nome_perfil, senha, email) VALUES (?, ?, ?, ?)";
    $stmt = $conexao->prepare($sql);
    $stmt->bind_param("ssss", $nome, $nome_perfil, $senha_hash, $email);

    if ($stmt->execute()) {
        echo "<p style='color: green;'>✅ Perfil cadastrado com sucesso!</p>";
    } else {
        echo "<p style='color: red;'>❌ Erro: " . $stmt->error . "</p>";
    }

    $stmt->close();
}
?>

<!DOCTYPE html>
<html lang="pt-BR">
<head>
  <meta charset="UTF-8">
  <title>Cadastrar Perfil</title>
</head>
<body>
  <h2>Cadastro de Perfil</h2>
  <form method="POST" action="">
      <input type="text" name="nome" placeholder="Nome completo" required><br><br>
      <input type="text" name="nome_perfil" placeholder="Nome do perfil" required><br><br>
      <input type="email" name="email" placeholder="E-mail" required><br><br>
      <input type="password" name="senha" placeholder="Senha" required><br><br>
      <button type="submit">Cadastrar</button>
  </form>
</body>
</html>
