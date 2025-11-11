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
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.8/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-sRIl4kxILFvY47J16cr9ZwB07vP4J8+LH7qKQnuqkuIAvNWLzeN8tE5YBujZqJLB" crossorigin="anonymous">

</head>

<body class="bodypesquisarreceitas">

  <div class="titulopesquisardiv">
    <p class="titulopesquisar">Brasil <br> Na Cozinha</p>
  </div>
  <form action="formPesquisar.php">
    <input type="text" name="valor" class="inputpesquisarreceitas" placeholder="Pesquise Aqui..."> <br><br>

    <input type="submit" value="Pesquisar" class="pesquisarreceitasbotao">
  </form>

  <div class="formpesquisardiv">

    <?php
    if (isset($_GET["valor"]) && !empty($_GET["valor"])) {
      $valor = $_GET["valor"];

      require_once "../conexao.php";
      require_once "../funcoes.php";


      $receitas = pesquisarReceitaNome($conexao, $valor);


      if (count($receitas) == 0) {
        echo "<p>Nenhuma Receita encontrada</p>";
      } else {
        echo "<br><table border='1' class='table tabela-personalizada' id='tabelas'>";
        echo "<tr>";
        echo "<th scope='col'>Perfil</th>";
        echo "<th scope ='col'>Receita</th>";
        echo "<th scope = 'col'>Foto</th>";
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
  </div>
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.8/dist/js/bootstrap.bundle.min.js" integrity="sha384-FKyoEForCGlyvwx9Hj09JcYn3nv7wiPVlz7YYwJrWVcXK/BmnVDxM+D2scQbITxI" crossorigin="anonymous"></script>
</body>

</html>