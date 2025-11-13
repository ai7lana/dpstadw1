<?php
require_once "../verificarLogado.php";
require_once "../conexao.php";
require_once "../funcoes.php";

?>
<!DOCTYPE html>
<html lang="pt-BR">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Lista de Perfis</title>
    <script src="../jquery-3.7.1.min.js"></script>
    <link rel="stylesheet" href="style/style.css">
    <script src="../jquery-3.7.1.min.js"></script>
    <link rel="stylesheet" href="style/style.css">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.8/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-sRIl4kxILFvY47J16cr9ZwB07vP4J8+LH7qKQnuqkuIAvNWLzeN8tE5YBujZqJLB" crossorigin="anonymous">
</head>

<body class="bodyListar">
    <div class="titulopesquisardiv">
        <p class="titulopesquisar" id="listar">Brasil <br> Na Cozinha</p>
    </div>

    <div class="listartudo">


        <?php
        require_once "../conexao.php";
        require_once "../funcoes.php";

        $listar_fav = listarFavorito($conexao);

        if (count($listar_fav) == 0) {
            echo "Não existem perfis cadastrados";
        } else {
        ?>
            <table border="1" class="table">
                <tr>

                    <td>Nome do perfil</td>
                    <td>Nome da Receita</td>

                </tr>
            <?php
            foreach ($listar_fav as $fav) {
                $perfil_idperfil = $fav['perfil_idperfil'];
                $receita_idreceita = $fav['receita_idreceita'];
                $nome_perfil = $fav['nome_perfil'];
                $nome_receita = $fav['nome_receita'];

                // <td colspan="2">Ação</td>


                echo "<tr>";


                echo "<td>$nome_perfil</td>";
                echo "<td>$nome_receita</td>";
                // echo "<td><a href='deletarFav.php?perfil=$perfil_idperfil&receita=$receita_idreceita' class='Excluiretabela'>Excluir</a></td>";
                // echo "<td><a href='formFavoritos.html?perfil=$perfil_idperfil&receita=$receita_idreceita' class='Excluiretabela'>Editar</a></td>";

                echo "</tr>";
            }
        }
            ?>
            </table>
    </div>

    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.8/dist/js/bootstrap.bundle.min.js" integrity="sha384-FKyoEForCGlyvwx9Hj09JcYn3nv7wiPVlz7YYwJrWVcXK/BmnVDxM+D2scQbITxI" crossorigin="anonymous"></script>
</body>

</html>