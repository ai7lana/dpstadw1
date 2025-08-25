<?php
require_once "../conexao.php"; 

if ($_SERVER["REQUEST_METHOD"] === "POST") {
    $perfil_id   = $_POST["perfil_idperfil"] ?? "";
    $receita_id  = $_POST["receita_idreceita"] ?? "";
    $comentario  = $_POST["comentario"] ?? null;
    $nota        = $_POST["nota"] ?? null;

    $sql = "INSERT INTO avaliacao (perfil_idperfil, receita_idreceita, comentario, nota) 
            VALUES (?, ?, ?, ?)";
    $stmt = $conexao->prepare($sql);
    $stmt->bind_param("iisd", $perfil_id, $receita_id, $comentario, $nota);

    if ($stmt->execute()) {
        echo "<p style='color: green;'>✅ Avaliação cadastrada com sucesso!</p>";
    } else {
        if ($conexao->errno == 1062) {
            echo "<p style='color: orange;'>⚠️ Esse perfil já avaliou essa receita!</p>";
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
  <title>Cadastrar Avaliação</title>
</head>
<body>
  <h2>Avaliar Receita</h2>
  <form method="POST" action="">
      <input type="number" name="perfil_idperfil" placeholder="ID do perfil" required><br><br>
      <input type="number" name="receita_idreceita" placeholder="ID da receita" required><br><br>
      <textarea name="comentario" placeholder="Comentário (opcional)" maxlength="45"></textarea><br><br>
      <input type="number" name="nota" placeholder="Nota (ex: 4.5)" step="0.1" min="0" max="5" required><br><br>
      <button type="submit">Enviar Avaliação</button>
  </form>
</body>
</html>
