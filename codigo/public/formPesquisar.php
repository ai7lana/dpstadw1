<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Document</title>
  <script src="../jquery-3.7.1.min.js"></script>

</head>

<body>
  <form action="formPesquisar.php">
    Receita: <br>
    <input type="text" name="valor"> <br><br>

    <input type="submit" value="Pesquisar">
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

      echo "<td>" . $receita ["nome_perfil"]. "</td>";
      echo "<td>" . $receita["nome_comida"] . "</td>";
      echo "<td><img src='foto/" . $receita["foto"] . "' alt='Foto da comida' width='100'></td>";
      echo "</tr>";
      }
    }
  }
  ?>
</body>

</html>
