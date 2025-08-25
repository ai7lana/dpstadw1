<?php
require_once "../conexao.php"; 

if ($_SERVER["REQUEST_METHOD"] === "POST") {
    $perfil_id   = $_POST["perfil_idperfil"] ?? "";
    $receita_id  = $_POST["receita_idreceita"] ?? "";

    $sql = "INSERT INTO favoritos (perfil_idperfil, receita_idreceita) VALUES (?, ?)";
    $stmt = $conexao->prepare($sql);
    $stmt->bind_param("ii", $perfil_id, $receita_id);

    if ($stmt->execute()) {
        echo "<p style='color: green;'>✅ Favorito adicionado com sucesso!</p>";
    } else {
        if ($conexao->errno == 1062) {
            echo "<p style='color: orange;'>⚠️ Esse favorito já existe!</p>";
        } else {
            echo "<p style='color: red;'>❌ Erro: " . $stmt->error . "</p>";
        }
    }

    $stmt->close();
}
?>

<!DOCTYPE html>
<html lang="pt-BR">
<head>
  <meta charset="UTF-8">
  <title>Adicionar Favorito</title>
</head>
<body>
  <h2>Adicionar Receita aos Favoritos</h2>
  <form method="POST" action="">
      <input type="number" name="perfil_idperfil" placeholder="ID do perfil" required><br><br>
      <input type="number" name="receita_idreceita" placeholder="ID da receita" required><br><br>
      <button type="submit">Adicionar aos Favoritos</button>
  </form>
</body>
</html>
