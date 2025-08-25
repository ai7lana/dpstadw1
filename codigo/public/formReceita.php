<?php
require_once "../conexao.php"; // ajusta se necessário

if ($_SERVER["REQUEST_METHOD"] === "POST") {
    $nome_comida    = $_POST["nome_comida"] ?? "";
    $tipo           = $_POST["tipo"] ?? "";
    $ingredientes   = $_POST["ingredientes"] ?? "";
    $modo_preparo   = $_POST["modo_de_preparo"] ?? "";
    $tempo          = $_POST["tempo"] ?? "";
    $rendimento     = $_POST["rendimento"] ?? "";
    $foto           = $_POST["foto"] ?? "";
    $regiao         = $_POST["regiao"] ?? null; // pode ser nulo
    $perfil_id      = $_POST["perfil_idperfil"] ?? "";

    $sql = "INSERT INTO receita (nome_comida, tipo, ingredientes, modo_de_preparo, tempo, rendimento, foto, regiao, perfil_idperfil)
            VALUES (?, ?, ?, ?, ?, ?, ?, ?, ?)";

    $stmt = $conexao->prepare($sql);
    $stmt->bind_param("ssssssssi", 
        $nome_comida, 
        $tipo, 
        $ingredientes, 
        $modo_preparo, 
        $tempo, 
        $rendimento, 
        $foto, 
        $regiao, 
        $perfil_id
    );

    if ($stmt->execute()) {
        echo "<p style='color: green;'>✅ Receita cadastrada com sucesso!</p>";
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
  <title>Cadastrar Receita</title>
</head>
<body>
  <h2>Cadastro de Receita</h2>
  <form method="POST" action="">
      <input type="text" name="nome_comida" placeholder="Nome da receita" required><br><br>
      <input type="text" name="tipo" placeholder="Tipo (almoço, lanche...)" required><br><br>
      <input type="text" name="ingredientes" placeholder="Ingredientes" required><br><br>
      <textarea name="modo_de_preparo" placeholder="Modo de preparo" required></textarea><br><br>
      <input type="text" name="tempo" placeholder="Tempo de preparo (ex: 45min)" required><br><br>
      <input type="text" name="rendimento" placeholder="Rendimento (ex: 4 porções)" required><br><br>
      <input type="text" name="foto" placeholder="Nome do arquivo da foto (ex: bolo.jpg)" required><br><br>
      <input type="text" name="regiao" placeholder="Região (opcional)"><br><br>
      <input type="number" name="perfil_idperfil" placeholder="ID do perfil autor" required><br><br>
      <button type="submit">Cadastrar Receita</button>
  </form>
</body>
</html>
