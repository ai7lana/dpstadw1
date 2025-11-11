<?php
require_once "../verificarLogado.php";
?>

<!DOCTYPE html>
<html lang="pt-BR">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Lista de Perfis</title>
    <script src="../jquery-3.7.1.min.js"></script>
    <link rel="stylesheet" href="style/style.css">
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

        $lista_perfil = listarPerfil($conexao);

        if (count($lista_perfil) == 0) {
            echo "Não existem perfis cadastrados";
        } else {
        ?>
            <table border="1">
                <tr>
                    <td>ID</td>
                    <td>Nome</td>
                    <td>Nome de Usuário</td>
                    <td>Email</td>
                    <td>Senha</td>
                    <td colspan="2">Ação</td>
                </tr>
            <?php
            foreach ($lista_perfil as $perfil) {
                $idperfil = $perfil['idperfil'];
                $nome = $perfil['nome'];
                $nome_perfil = $perfil['nome_perfil'];
                $email = $perfil['email'];
                $senha = $perfil['senha'];

                echo "<tr>";
                echo "<td>$idperfil</td>";
                echo "<td>$nome</td>";
                echo "<td>$nome_perfil</td>";
                echo "<td>$email</td>";
                echo "<td>$senha</td>";
                echo "<td><a href='deletarPerfil.php?id=$idperfil'>Excluir</a></td>";
                echo "<td><a href='editarPerfil.php?id=$idperfil'>Editar</a></td>";
                echo "</tr>";
            }
        }
            ?>
            </table>
    </div>
    <button type="button" onclick="history.go(-1)" class="voltar" id="voltarlogin"> ↩ Voltar </button>

    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.8/dist/js/bootstrap.bundle.min.js" integrity="sha384-FKyoEForCGlyvwx9Hj09JcYn3nv7wiPVlz7YYwJrWVcXK/BmnVDxM+D2scQbITxI" crossorigin="anonymous"></script>
</body>

</html>