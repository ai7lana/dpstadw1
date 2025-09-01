<?php
    if (isset($_GET['id'])) {
        // echo "editar";

        require_once "../conexao.php";
        require_once "../funcoes.php";

        $id = $_GET['id'];

        $receita = pesquisarReceitaId($conexao, $id);
        
        $nome_comida = $receita['nome_comida'];
        $tipo = $receita['tipo'];
        $ingredientes = $receita['ingredientes'];
        $modo_preparo = $receita['modo_de_preparo'];
        $tempo = $receita['tempo'];
        $rendimento = $receita['rendimento'];
        $foto = $receita['foto'];
        $regiao = $receita['regiao'];
        $nome_perfil = $receita['perfil_idperfil'];

        $botao = "Atualizar";
    }
    else {
        // echo "novo";
        $id = 0;
        $nome = "";
        $cpf = "";
        $endereco = "";

        $botao = "Cadastrar";
    }
?>

<!DOCTYPE html>
<html lang="pt-BR">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Document</title>
  <script src="../jquery-3.7.1.min.js"></script>
</head>
<body>
  <h2>Cadastro de Receita</h2>
  <form action="../salvarReceita.php?id=<?php echo $id; ?>" method="post" enctype="multipart/form-data">

      <input type="text" name="nome_comida" placeholder="Nome da receita" required><br><br>

      <input type="text" name="tipo" placeholder="Tipo (almoço, lanche...)" required><br><br>

      <input type="text" name="ingredientes" placeholder="Ingredientes" required><br><br>

      <textarea name="modo_de_preparo" placeholder="Modo de preparo" required></textarea><br><br>

      <input type="text" name="tempo" placeholder="Tempo de preparo (ex: 45min)" required><br><br>

      <input type="text" name="rendimento" placeholder="Rendimento (ex: 4 porções)" required><br><br>

      <input type="file" name="foto" required> <br><br>

      <input type="text" name="regiao" placeholder="Região (opcional)"><br><br>

      <input type="number" name="perfil_idperfil" placeholder="ID do perfil autor" required><br><br>

      <input type="submit" value="<?php echo $botao; ?>">
      
  </form>
</body>
</html>
