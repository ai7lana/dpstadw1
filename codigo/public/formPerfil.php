<?php
require_once "../conexao.php"; 

if ($_SERVER["REQUEST_METHOD"] === "POST") {
    $nome_comida    = $_POST["nome_comida"] ?? "";
    $tipo           = $_POST["tipo"] ?? "";
    $ingredientes   = $_POST["ingredientes"] ?? "";
    $modo_preparo   = $_POST["modo_de_preparo"] ?? "";
    $tempo          = $_POST["tempo"] ?? "";
    $rendimento     = $_POST["rendimento"] ?? "";
    $regiao         = $_POST["regiao"] ?? null;
    $perfil_id      = $_POST["perfil_idperfil"] ?? "";

    // --- Upload da foto ---
    $foto = null;
    if (!empty($_FILES["foto"]["name"])) {
        $pasta = "uploads/"; // cria essa pasta no servidor
        if (!is_dir($pasta)) {
            mkdir($pasta, 0777, true);
        }

        $nomeArquivo = time() . "_" . basename($_FILES["foto"]["name"]);
        $caminho = $pasta . $nomeArquivo;

        if (move_uploaded_file($_FILES["foto"]["tmp_name"], $caminho)) {
            $foto = $caminho; // salva o caminho no banco
        } else {
            echo "<p style='color:red;'>❌ Erro ao salvar a imagem!</p>";
        }
    }

    // --- Inserção no banco ---
    $sql = "INSERT INTO receita (nome_comida, tipo, ingredientes, modo_de_preparo, tempo, 
                                rendimento, foto, regiao, perfil_idperfil)
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
  <form method="POST" action="" enctype="multipart/form-data">
      <input type="text" name="nome_comida" placeholder="Nome da receita" required><br><br>
      <input type="text" name="tipo" placeholder="Tipo (almoço, lanche...)" required><br><br>
      <input type="text" name="ingredientes" placeholder="Ingredientes" required><br><br>
      <textarea name="modo_de_preparo" placeholder="Modo de preparo" required></textarea><br><br>
      <input type="text" name="tempo" placeholder="Tempo de preparo" required><br><br>
      <input type="text" name="rendimento" placeholder="Rendimento" required><br><br>
      <input type="file" name="foto" accept="image/*" required><br><br>
      <input type="text" name="regiao" placeholder="Região (opcional)"><br><br>
      <input type="number" name="perfil_idperfil" placeholder="ID do perfil autor" required><br><br>
      <button type="submit">Cadastrar Receita</button>
  </form>
</body>
</html>
