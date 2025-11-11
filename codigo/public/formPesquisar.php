<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Pesquise pelas receitas</title>
  <script src="jquery-3.7.1.min.js"></script>
  <script src="jquery.validate.min.js"></script>
  <link rel="stylesheet" href="style/reset.css">
  <link rel="stylesheet" href="style/style.css">
  <script src="../jquery-3.7.1.min.js"></script>

</head>

<body class="bodypesquisarreceitas">

<div class="titulopesquisardiv">
  <p class="titulopesquisar">Brasil <br> Na Cozinha</p>
</div>
  <form action="formPesquisar.php">
    Receita: <br>
    <input type="text" name="valor"> <br><br>
    
    <input type="submit" value="Pesquisar" class="pesquisarreceitasbotao">
  </form>
  <?php
  if (isset($_GET["valor"]) && !empty($_GET["valor"])) {
    $valor = $_GET["valor"];

    require_once "../conexao.php";
    require_once "../funcoes.php";


    $receitas = pesquisarReceitaNome($conexao, $valor);

    if (count($receitas) == 0) {
      echo "<p>Nenhuma Receita encontrada</p>";
    } else {
      echo "<br><table border='1'>";
      echo "<tr>";
      echo "<th>Perfil</th>";
      echo "<th>Receita</th>";
      echo "<th>Foto</th>";
      echo "</tr>";

      foreach ($receitas as $receita) {
        echo "<tr>";

        echo "<td>" . $receita["nome_perfil"] . "</td>";
        echo "<td>" . $receita["nome_comida"] . "</td>";
        echo "<td><img src='foto/" . $receita["foto"] . "' alt='Foto da comida' width='100'></td>";
        echo "</tr>";
      }
    }
  }
  ?>
</body>

</html>